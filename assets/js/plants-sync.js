/**
 * Plant Sync Real-time UI Controller
 * Handles start/stop sync functionality with live progress updates
 */

(function ($) {
  "use strict";

  const PlantsSync = {
    // State variables
    syncRunning: false,
    pollInterval: null,
    lastLogIndex: 0,

    // DOM elements
    $startBtn: null,
    $stopBtn: null,
    $progressBar: null,
    $progressText: null,
    $syncLog: null,
    $clearLogBtn: null,

    // Stats elements
    $currentProject: null,
    $projectsProcessed: null,
    $plantsUpdated: null,
    $plantsCreated: null,
    $errorsCount: null,
    $elapsedTime: null,

    /**
     * Initialize the sync controller
     */
    init: function () {
      this.cacheElements();
      this.bindEvents();
      this.initializeUI();
    },

    /**
     * Cache DOM elements for better performance
     */
    cacheElements: function () {
      this.$startBtn = $("#start-sync");
      this.$stopBtn = $("#stop-sync");
      this.$progressBar = $("#progress-bar");
      this.$progressText = $("#progress-text");
      this.$syncLog = $("#sync-log");
      this.$clearLogBtn = $("#clear-log");

      // Stats elements
      this.$currentProject = $("#current-project");
      this.$projectsProcessed = $("#projects-processed");
      this.$plantsUpdated = $("#plants-updated");
      this.$plantsCreated = $("#plants-created");
      this.$errorsCount = $("#errors-count");
      this.$elapsedTime = $("#elapsed-time");
    },

    /**
     * Bind event handlers
     */
    bindEvents: function () {
      this.$startBtn.on("click", this.handleStartClick.bind(this));
      this.$stopBtn.on("click", this.handleStopClick.bind(this));
      this.$clearLogBtn.on("click", this.handleClearLog.bind(this));
    },

    /**
     * Initialize UI state
     */
    initializeUI: function () {
      this.resetProgress();
      this.resetStats();
      this.appendLog("Ready to start plant synchronization...");
    },

    /**
     * Handle start sync button click
     */
    handleStartClick: function () {
      if (this.syncRunning) return;

      this.syncRunning = true;
      this.updateButtonStates();
      this.resetProgress();
      this.resetStats();
      this.lastLogIndex = 0;

      this.appendLog("Starting plant synchronization...");

      // Start the sync process
      this.startSync();

      // Start polling for updates
      this.startPolling();
    },

    /**
     * Handle stop sync button click
     */
    handleStopClick: function () {
      if (!this.syncRunning) return;

      this.appendLog("Stopping sync process...");

      // Send stop signal to server
      $.post(plantsSync.ajax_url, {
        action: "planok_plants_stop_sync",
        _ajax_nonce: plantsSync.nonce,
      })
        .done((response) => {
          if (response.success) {
            this.appendLog("Stop signal sent successfully");
          } else {
            this.appendLog(
              "Error sending stop signal: " +
                (response.data?.message || "Unknown error"),
            );
          }
        })
        .fail(() => {
          this.appendLog("Failed to send stop signal");
        });
    },

    /**
     * Handle clear log button click
     */
    handleClearLog: function () {
      this.$syncLog.empty();
      this.appendLog("Log cleared");
    },

    /**
     * Start the sync process on the server
     */
    startSync: function () {
      $.post(plantsSync.ajax_url, {
        action: "update_plants_data",
        current_project: 0,
        _ajax_nonce: plantsSync.nonce,
      })
        .done((data) => {
          this.appendLog("Sync process initiated");
          console.log({ data });
        })
        .fail((error) => {
          this.appendLog("Failed to start sync: " + error);
          this.stopSync();
        });
    },

    /**
     * Start polling for sync statistics
     */
    startPolling: function () {
      // Start polling after a short delay to allow sync process to initialize
      setTimeout(() => {
        this.pollInterval = setInterval(() => {
          this.pollStats();
        }, plantsSync.poll_interval);
      }, 2000); // Wait 2 seconds before starting to poll
    },

    /**
     * Stop polling and reset sync state
     */
    stopSync: function () {
      this.syncRunning = false;

      if (this.pollInterval) {
        clearInterval(this.pollInterval);
        this.pollInterval = null;
      }

      this.updateButtonStates();
    },

    /**
     * Poll server for current sync statistics
     */
    pollStats: function () {
      $.get(plantsSync.ajax_url, {
        action: "planok_plants_get_stats",
        _ajax_nonce: plantsSync.nonce,
      })
        .done((response) => {
          if (response.success) {
            // Check if sync is not running
            if (response.data.sync_running === false) {
              this.onSyncIdleDetected(response.data.message);
              return;
            }

            this.updateUI(response.data);

            // Check if sync is completed
            if (response.data.is_completed) {
              this.onSyncCompleted();
            }
          }
        })
        .fail(() => {
          this.appendLog("Failed to fetch sync statistics");
        });
    },

    /**
     * Update UI with fresh data from server
     */
    updateUI: function (data) {
      // Update progress bar
      const progress = Math.round(data.progress || 0);
      this.$progressBar.css("width", progress + "%");
      this.$progressText.text(progress + "%");

      // Update statistics
      const stats = data.stats || {};

      this.$currentProject.text(stats.current_project_title || "-");
      this.$projectsProcessed.text(
        `${data.processed_projects || 0} / ${stats.total_proyectos || 0}`,
      );
      this.$plantsUpdated.text(stats.plantas_actualizadas || 0);
      this.$plantsCreated.text(stats.plantas_creadas || 0);
      this.$errorsCount.text(stats.errores || 0);
      this.$elapsedTime.text(data.elapsed_time || "0m 0s");

      // Update log with new entries
      this.updateLog(data.log_entries || []);
    },

    /**
     * Update log display with new entries
     */
    updateLog: function (logEntries) {
      if (!Array.isArray(logEntries)) return;

      // Only show new log entries (avoid duplicates)
      const newEntries = logEntries.slice(this.lastLogIndex);

      newEntries.forEach((entry) => {
        if (entry.trim()) {
          this.$syncLog.append(entry + "\n");
        }
      });

      // Update last index
      this.lastLogIndex = logEntries.length;

      // Auto-scroll to bottom
      this.scrollLogToBottom();
    },

    /**
     * Handle sync completion
     */
    onSyncCompleted: function () {
      this.stopSync();
      this.appendLog("\n=== SYNC COMPLETED ===");
      this.appendLog("Plant synchronization has finished successfully!");

      // Flash progress bar to indicate completion
      this.$progressBar.addClass("completed");
      setTimeout(() => {
        this.$progressBar.removeClass("completed");
      }, 2000);
    },

    /**
     * Handle when no sync process is detected running
     */
    onSyncIdleDetected: function (message) {
      if (this.syncRunning) {
        this.stopSync();

        // Check if we have progress data to determine if this was a completion
        const currentProgress = parseInt(
          this.$progressText.text().replace("%", ""),
        );

        if (currentProgress >= 100) {
          // This appears to be a completion, not an error
          this.appendLog("\n=== SYNC COMPLETED ===");
          this.appendLog("All projects have been processed successfully!");

          // Flash progress bar to indicate completion
          this.$progressBar.addClass("completed");
          setTimeout(() => {
            this.$progressBar.removeClass("completed");
          }, 2000);
        } else if (currentProgress > 0) {
          // Sync was interrupted mid-process
          this.appendLog("\n=== SYNC INTERRUPTED ===");
          this.appendLog(
            "Server reports: " + (message || "Sync process was interrupted"),
          );
          this.appendLog(
            "Progress was at " + currentProgress + "% when stopped.",
          );
        } else {
          // Sync stopped before making progress (likely a startup issue)
          this.appendLog("\n=== SYNC STOPPED ===");
          this.appendLog(
            "Server reports: " +
              (message || "No sync process currently running"),
          );
        }

        this.appendLog("Polling stopped.");
      }
    },

    /**
     * Update button states based on sync status
     */
    updateButtonStates: function () {
      this.$startBtn.prop("disabled", this.syncRunning);
      this.$stopBtn.prop("disabled", !this.syncRunning);

      if (this.syncRunning) {
        this.$startBtn
          .find(".dashicons")
          .removeClass("dashicons-update")
          .addClass("dashicons-update spin");
      } else {
        this.$startBtn
          .find(".dashicons")
          .removeClass("spin")
          .addClass("dashicons-update");
      }
    },

    /**
     * Reset progress indicators
     */
    resetProgress: function () {
      this.$progressBar.css("width", "0%");
      this.$progressText.text("0%");
    },

    /**
     * Reset statistics display
     */
    resetStats: function () {
      this.$currentProject.text("-");
      this.$projectsProcessed.text("0 / 0");
      this.$plantsUpdated.text("0");
      this.$plantsCreated.text("0");
      this.$errorsCount.text("0");
      this.$elapsedTime.text("0m 0s");
    },

    /**
     * Append message to log with timestamp
     */
    appendLog: function (message) {
      const timestamp = new Date().toLocaleTimeString();
      this.$syncLog.append(`[${timestamp}] ${message}\n`);
      this.scrollLogToBottom();
    },

    /**
     * Auto-scroll log to bottom
     */
    scrollLogToBottom: function () {
      this.$syncLog.scrollTop(this.$syncLog[0].scrollHeight);
    },
  };

  // Initialize when document is ready
  $(document).ready(function () {
    // Only initialize if we're on the plants sync page
    if ($("#plants-sync-app").length > 0) {
      PlantsSync.init();
    }
  });
})(jQuery);

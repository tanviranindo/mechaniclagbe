        <div>
            <?php
            if (isset($_GET["error"])) { ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header" style="background-color: #f6cf57;">
                            <strong class="me-auto">Error icon</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?php echo $_GET["error"]; ?>
                        </div>
                    </div>
                </div>
            <?php } else if (isset($_GET["success"])) { ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header" style="background-color: #f6cf57;">
                            <strong class="me-auto">Success icon</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?php echo $_GET["success"]; ?>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
<?php
//Page Activation
$$page = "active";
?>

<!-- Sticky bar -->
<div class="container-fluid sticky">
    <center>
        <?php
        if ($btn == "pay") {
        ?>
            <div class="row post-btn">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" name="pay">Pay</button>
                </div>
            </div>
        <?php
        }
        if ($btn == "Post a Request") {
        ?>
            <div class="row post-btn">
                <div class="col-12">
                    <a href="./Post-Requst.php">
                        <button type="button" class="btn btn-primary">Post a Request</button>
                    </a>
                </div>
            </div>
        <?php
        }
        if ($btn == "cancel order") {
        ?>
            <div class="row post-btn">
                <div class="col-12">
                    <?php
                    if ($ord_cnfrm_sl == "complete") {
                    ?>
                        <a href="./orders-1.php">
                            <button type="button" class="btn btn-primary">Confirm</button>
                        </a>
                    <?php
                    } else {
                    ?>
                        <button type="button" class="btn btn-primary" disabled>Confirm</button>

                    <?php
                    }
                    ?>
                </div>
                <!--
                <div class="col-12" style="margin-top: 5px;">
                    <a href="./order-2.php" class="btn btn-outline-danger">cancel order</a>
                </div>-->
            </div>
        <?php
        }
        if ($btn == "rate") {
        ?>
            <div class="row post-btn">
                <div class="col-12" style="margin-top: 5px;">
                    <a href="./order-5.php" class="btn btn-warning">Rate</a>
                </div>
            </div>
        <?php
        }
        if ($btn == "rate2") {
        ?>
            <div class="row post-btn">
                <div class="col-12" style="margin-top: 5px;">
                    <a href="./orders-6.php" class="btn btn-warning">Rate</a>
                </div>
            </div>
        <?php
        }
        if ($btn == "rated") {
        ?>
            <div class="row post-btn">
                <div class="col-12" style="margin-top: 5px;">
                    <a href="./order-2.php">
                        <button type="button" class="btn btn-warning" disabled>Rate</button></a>
                </div>
            </div>
        <?php
        }
        if ($btn == "complete") {
        ?>
            <div class="row post-btn">
                <div class="col-12">
                    <button type="button" class="btn btn-warning">Rate</button>
                </div>
            </div>
        <?php
        }
        if ($btn == "cancel") {
        ?>
            <div class="row post-btn">
                <div class="col-12" style="padding: 10px;">
                    <span class="red" style="text-align: center;">* You can only get a full refund by canceling the order before Freelancers accepts the order.</span>
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-danger">Cansel</button>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="row menu-wt">
            <div class="col-3">
                <a href="./home.php">
                    <button type="button" class="btn c-btn <?php echo "$Home"; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                        </svg><br>
                        <span>Home</span>
                    </button>
                </a>
            </div>
            <div class="col-3">
                <a href="./order-ongoing.php">
                    <button type="button" class="btn c-btn <?php echo "$Order"; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                        </svg><br>
                        <span>Order</span>

                    </button>
                </a>
            </div>
            <div class="col-3">
                <a href="./inbox.php">
                    <button type="button" class="btn c-btn <?php echo "$Inbox"; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z" />
                        </svg><br>
                        <span>Inbox</span>
                    </button>
                </a>
            </div>
            <div class="col-3">
                <a href="./user-acc.php">
                    <button type="button" class="btn c-btn <?php echo "$Profile"; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg><br>
                        <span>Profile</span>
                    </button>
                </a>
            </div>

        </div>
    </center>
</div>
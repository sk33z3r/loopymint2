<?php

    $collection_lower = file_get_contents(".tempfile");
    $traits_file = file_get_contents("./images/${collection_lower}/traits.json");
    $traits = json_decode($traits_file, true);

    if (!empty($traits)) { ?>
        <h3>Collection Info</h3>
        <div id="guide">
            <div class="section">
                <p><b>Collection Name</b>: <?php echo $traits['collection_name'] ?></p>
                <?php if (array_key_exists('artist_name', $traits)) {
                    echo "<p><b>Artist's Name</b>: " . $traits['artist_name'] . "</p>";
                } ?>
                <?php if (array_key_exists('royalty_address', $traits)) {
                    echo "<p><b>Royalty Address</b>: " . $traits['royalty_address'] . "</p>";
                } ?>
                <p><b>Minter's Address</b>: <?php echo $traits['mint_address'] ?></p>
                <p><b>Traits</b>: <?php echo $traits['trait_count'] ?></p>
                <?php if ($traits['background_color'] == 0) {
                    echo "<p><b>Generate Background Colors</b>: YES</p>";
                } ?>
            </div>
        </div>
    <?php } else {
        Redirect('/setup/1', false);
    }
?>
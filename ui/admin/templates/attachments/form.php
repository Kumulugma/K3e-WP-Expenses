<?php
$post_attachments = (get_post_meta(get_the_ID(), "post_attachments", true));

if ($post_attachments) {
    $post_attachments = unserialize($post_attachments);
    $post_attachments_input = $post_attachments;
    $post_attachments = explode(",", $post_attachments);
} else {
    $post_attachments = [];
    $post_attachments_input = "";
}
?>
<div id="attachments-box" data-default='fa fa-upload'' style="padding-left: 5px;">
    <?php if (count($post_attachments) > 0 && $post_attachments[0] != "") { ?>
        <?php foreach ($post_attachments as $attachment) { ?>
            <?php
            switch (get_post_mime_type($attachment)) {
                case 'application/pdf':
                    echo '<a href="post.php?post='.$attachment.'&action=edit"><i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size: 4em;"></i></a>';
                    break;
                case 'image/jpeg':
                    echo '<a href="post.php?post='.$attachment.'&action=edit"><i class="fa fa-file-image-o" aria-hidden="true" style="font-size: 4em;"></i></a>';
                    break;
                default:
                    echo '<a href="post.php?post='.$attachment.'&action=edit"><i class="fa fa-file" aria-hidden="true" style="font-size: 4em;"></i></a>';
                    break;
            }
            ?>
        <?php } ?>
    <?php } else { ?>
        <i class="fa fa-upload" aria-hidden="true" style="font-size: 4em"></i>
<?php } ?>
</div>
<input type="hidden" name="post_attachments" value="<?php echo esc_attr($post_attachments_input); ?>" id="post-attachments" class="regular-text" />
<div style="display: block; margin-top: 4px;">
    <input type='button' class="button-primary" value="<?php esc_attr_e('Wybierz pliki', 'k3e'); ?>" id="post_media_manager" style="margin-left: 5px;"/>
    <input type='button' class="button-secondary" value="<?php esc_attr_e('Usuń pliki', 'k3e'); ?>" id="post_media_remover"/>
</div>

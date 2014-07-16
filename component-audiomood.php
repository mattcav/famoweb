<?php 
    $songID = get_post_meta($post->ID, '_famo_audiomood', true);
?>

<?php if($songID): ?>
    <button id="audiomoodButton" class="tiny audiomood__trigger">
        audiomood
    </button>
    <section id="audiomood" class="entry__row audiomood">
        <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $songID; ?>&amp;color=000000&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
    </section>
<?php endif; ?>
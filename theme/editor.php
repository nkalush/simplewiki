<div id="editor"><?php echo $raw; ?></div>
<article id="editor_preview">
	<?php echo $content; ?>
</article>
<div class="controls">
	<form method="post" action="">
		<input type="hidden" name="uri" value="">
		<input type="hidden" name="content" id="content_input" value="<?php echo $raw; ?>">
		<button class="btn btn-block btn-primary btn-lg">Save</button>
	</form>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/showdown/0.3.1/showdown.min.js"></script>
<script>
jQuery(document).ready(function($){
	var editor = ace.edit("editor");
	editor.setTheme("ace/theme/monokai");
	editor.getSession().setMode("ace/mode/markdown");
	editor.setTheme("ace/theme/crimson_editor");
	
	editor.getSession().on('change', function(e) {
		var content=editor.getValue();
		var converter = new Showdown.converter();
		$("#content_input").val(content);
		$("#editor_preview").html(converter.makeHtml(content));
	});
});
</script>
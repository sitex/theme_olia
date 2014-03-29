$(document).ready ->
	key = 'CTRL'
	# key = 'Cmd' if navigator.userAgent.toLowerCase().indexOf('mac') != - 1

	$('#bookmarkme').click ->
		if window.sidebar && window.sidebar.addPanel
			window.sidebar.addPanel(document.title,window.location.href,'')
		else if window.external && ('AddFavorite' in window.external) # IE Favorite
			window.external.AddFavorite(location.href,document.title)
		else if(window.opera && window.print) # Opera Hotlist
			this.title=document.title;
			return true;
		else # webkit - safari/chrome
			alert('Нажмите ' + key + ' + D, чтобы добавить в избранное.');

	$('.names a').click ->
		rel = $(this).data('rel')
		$('.reviewer').hide()
		$('.names a').removeClass('initial')
		$('.names a').removeClass('active')
		$(this).addClass('active')
		$(rel).show()
		$('#ob_overlay').show()
		$('.ytvideo').hide()	# video
		false

	$('a.close_reviewer, #ob_overlay').click ->
		$('.names a').removeClass('active')
		$('.names a').addClass('initial')
		$('.reviewer').hide()
		$('#ob_overlay').hide()
		$('.ytvideo').show()	# video
		false

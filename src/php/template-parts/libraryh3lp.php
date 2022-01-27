<?php
/**
 * Displays the library help icon
 *
 * @package Forbes2022
 */

$libraryh3lp_queue    = 'forbes-library-queue';
$libraryh3lp_chat_url = 'https://libraryh3lp.com/html/chat-box.html?' .
	http_build_query(
		array(
			'queue' => $libraryh3lp_queue,
			'skin'  => 33929,
			'email' => 'https://forbeslibrary.org/info/contact/',
		)
	);
// The only things we echo below are the variables set above, which are perfectly safe.
// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
?>
<script>
function openLibraryh3lp() {
	window.open(
		'<?php echo $libraryh3lp_chat_url; ?>',
		'AskUs',
		'resizable=1,width=375,height=300'
	);
}
</script>

<!-- Proactive chat invitation -->
<div class="libraryh3lp no-print" style="display: none;" data-lh3-jid="<?php echo $libraryh3lp_queue; ?>@chat.libraryh3lp.com">
	<div data-lh3-proactive-placement="bottom-right" data-lh3-proactive-theme="cupertino" data-lh3-proactive-timer="30" data-lh3-proactive-title="Chat Available" style="display: none;">
		<p>Need help? Chat with us now.</p>
		<div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix" style="padding: 0px;">
		<div class="ui-dialog-buttonset">
			<button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" onclick="openLibraryh3lp(); libraryh3lp.closeProactive(true); return false;" role="button" style="margin-left: 0px;">
				<span class="ui-button-text" style="padding: 0.2em;">Click to chat</span>
			</button>
			<button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" onclick="libraryh3lp.closeProactive(); return false;" role="button" style="margin-right: 0px;">
				<span class="ui-button-text" style="padding: 0.2em;">No thanks</span>
			</button>
			</div>
		</div>
	</div>
</div>

<!-- When chat is available. -->
<a class="libraryh3lp chat-widget chat-available icon icon-chat no-print"
	data-lh3-jid="<?php echo $libraryh3lp_queue; ?>@chat.libraryh3lp.com"
	title="Chat available"
	role="button"
	href="#" onclick="openLibraryh3lp(); return false;"
	style="display: none;"
>
	<span class="screen-reader-text">Chat Available</span>
</a>

<!-- When chat is not available. -->
<a class="libraryh3lp chat-widget chat-offline icon icon-chat-offline no-print"
	title="Chat offline. Visit contact page."
	role="button"
	aria-disabled="true"
	href="https://forbeslibrary.org/info/contact/"
	style="display: none;"
>
	<span class="screen-reader-text">Chat Offline</span>
</a>

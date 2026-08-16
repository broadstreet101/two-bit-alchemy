<?php
/**
 * Cabinet exhibit: A Sketch That Was Never Meant to Exist.
 *
 * @package Two_Bit_Alchemy
 */

get_template_part( 'template-parts/site-header' );

$image_uri = get_theme_file_uri( '/assets/images/cabinet/charlie-adlard-amish-zombie-sketch-web.jpg' );
global $two_bit_alchemy_current_cabinet_exhibit;
?>

<article class="page-content project-exhibit cabinet-exhibit">
	<nav class="entry-meta" aria-label="<?php esc_attr_e( 'Cabinet context', 'two-bit-alchemy' ); ?>">
		<a href="<?php echo esc_url( home_url( '/cabinet/' ) ); ?>"><?php esc_html_e( 'Cabinet', 'two-bit-alchemy' ); ?></a>
	</nav>

	<header class="entry-header project-exhibit__header">
		<p class="catalog-label"><?php esc_html_e( 'Cabinet No. 001', 'two-bit-alchemy' ); ?></p>
		<p class="entry-meta"><?php esc_html_e( 'Cabinet Exhibit', 'two-bit-alchemy' ); ?></p>
		<?php if ( ! empty( $two_bit_alchemy_current_cabinet_exhibit ) && ! two_bit_alchemy_is_cabinet_exhibit_published( $two_bit_alchemy_current_cabinet_exhibit ) ) : ?>
			<p class="entry-meta"><?php esc_html_e( 'Preview only. Not publicly published.', 'two-bit-alchemy' ); ?></p>
		<?php endif; ?>
		<h1 class="entry-title"><?php esc_html_e( 'A Sketch That Was Never Meant to Exist', 'two-bit-alchemy' ); ?></h1>
	</header>

	<figure class="exhibit-figure">
		<img
			src="<?php echo esc_url( $image_uri ); ?>"
			alt="<?php esc_attr_e( 'Original black-and-white Charlie Adlard sketch of two Amish zombies, signed by the artist on a sketchbook page.', 'two-bit-alchemy' ); ?>"
			width="1000"
			height="1265"
			decoding="async"
			fetchpriority="high"
		/>
		<figcaption>
			<?php esc_html_e( 'Original sketch by Charlie Adlard, created after an email exchange about an Amish-zombie tattoo idea.', 'two-bit-alchemy' ); ?>
			<?php esc_html_e( 'Artwork by Charlie Adlard. Publication permission / copyright status: review before public launch.', 'two-bit-alchemy' ); ?>
		</figcaption>
	</figure>

	<section class="project-section" aria-labelledby="artifact-metadata-title">
		<h2 id="artifact-metadata-title"><?php esc_html_e( 'Artifact Metadata', 'two-bit-alchemy' ); ?></h2>
		<dl class="metadata-list">
			<div>
				<dt><?php esc_html_e( 'Artifact type', 'two-bit-alchemy' ); ?></dt>
				<dd><?php esc_html_e( 'Original sketch', 'two-bit-alchemy' ); ?></dd>
			</div>
			<div>
				<dt><?php esc_html_e( 'Artist', 'two-bit-alchemy' ); ?></dt>
				<dd><?php esc_html_e( 'Charlie Adlard', 'two-bit-alchemy' ); ?></dd>
			</div>
			<div>
				<dt><?php esc_html_e( 'Subject', 'two-bit-alchemy' ); ?></dt>
				<dd><?php esc_html_e( 'Two Amish zombies', 'two-bit-alchemy' ); ?></dd>
			</div>
			<div>
				<dt><?php esc_html_e( 'Medium', 'two-bit-alchemy' ); ?></dt>
				<dd><?php esc_html_e( 'Black ink sketch', 'two-bit-alchemy' ); ?></dd>
			</div>
			<div>
				<dt><?php esc_html_e( 'Date', 'two-bit-alchemy' ); ?></dt>
				<dd><?php esc_html_e( 'After Dada contacted Charlie Adlard; exact date not captured.', 'two-bit-alchemy' ); ?></dd>
			</div>
			<div>
				<dt><?php esc_html_e( 'Source / provenance', 'two-bit-alchemy' ); ?></dt>
				<dd><?php esc_html_e( 'Sent by Charlie Adlard after email correspondence.', 'two-bit-alchemy' ); ?></dd>
			</div>
			<div>
				<dt><?php esc_html_e( 'Current location', 'two-bit-alchemy' ); ?></dt>
				<dd><?php esc_html_e( "Framed in Dada's office.", 'two-bit-alchemy' ); ?></dd>
			</div>
			<div>
				<dt><?php esc_html_e( 'Rights / attribution note', 'two-bit-alchemy' ); ?></dt>
				<dd><?php esc_html_e( 'Artwork by Charlie Adlard. Publication permission / copyright status: review before public launch. Two-Bit Alchemy does not claim copyright ownership in the artwork and does not imply endorsement by Charlie Adlard, The Walking Dead, Image Comics, or Skybound.', 'two-bit-alchemy' ); ?></dd>
			</div>
		</dl>
	</section>

	<section class="project-section cabinet-exhibit__story" aria-labelledby="artifact-story-title">
		<h2 id="artifact-story-title"><?php esc_html_e( 'Story', 'two-bit-alchemy' ); ?></h2>

		<p><?php esc_html_e( "There are a handful of things hanging on the walls of my office that probably don't mean much to anyone else.", 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'This is one of them.', 'two-bit-alchemy' ); ?></p>

		<p><?php echo wp_kses_post( __( "At first glance, it's just a drawing: two Amish zombies sketched in black ink by Charlie Adlard, the artist whose work defined <em>The Walking Dead</em> comic for years.", 'two-bit-alchemy' ) ); ?></p>

		<p><?php esc_html_e( "But that's not really why it hangs there.", 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'It hangs there because of what happened before it existed.', 'two-bit-alchemy' ); ?></p>

		<p><?php echo wp_kses_post( __( "I grew up at exactly the right time to develop a lifelong fascination with zombies. My friends and I watched VHS copies of <em>Night of the Living Dead</em>, <em>Dawn of the Dead</em>, <em>Day of the Dead</em>, and just about every second-rate imitation we could get our hands on. This would have been sometime in the mid-to-late 1980s, and I was almost certainly too young when I got my first taste of George Romero's undead.", 'two-bit-alchemy' ) ); ?></p>

		<p><?php esc_html_e( "It didn't seem to hurt anything.", 'two-bit-alchemy' ); ?></p>

		<p><?php echo wp_kses_post( __( "By around 2005, I had started reading <em>The Walking Dead</em>. When the television adaptation arrived a few years later, I was one of the comic readers wondering whether they could possibly take this story we loved and translate it to television without screwing it up.", 'two-bit-alchemy' ) ); ?></p>

		<p><?php esc_html_e( 'At least in the beginning, I thought they did an incredibly good job.', 'two-bit-alchemy' ); ?></p>

		<p><?php echo wp_kses_post( __( "Somewhere in the long stretch between watching zombie movies as a chubby kid and watching <em>The Walking Dead</em> on television, I had also developed an idea for a tattoo.", 'two-bit-alchemy' ) ); ?></p>

		<p><?php esc_html_e( 'Amish zombies.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( "I grew up in Appalachian Pennsylvania. There weren't a tremendous number of actual Amish immediately around my hometown, mostly Mennonite and German Baptist, but Amish country was close enough that the idea felt appropriately connected to home. More importantly, it seemed unlikely that everybody else in the world already had an Amish zombie tattoo.", 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'I tried sketching a few ideas myself.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'Nothing worked.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'Eventually I had another idea.', 'two-bit-alchemy' ); ?></p>

		<p><?php echo wp_kses_post( __( 'Why not ask the guy who actually draws <em>The Walking Dead</em>?', 'two-bit-alchemy' ) ); ?></p>

		<p><?php echo wp_kses_post( __( "Charlie Adlard's contact information was available through the comic's publisher, so I sent him an email. I explained that I was a huge fan, that I was considering this ridiculous Amish zombie tattoo, and that rather than asking some tattoo artist who didn't know me to invent it from scratch, I thought it couldn't hurt to ask Charlie what <strong>his</strong> version of Amish zombies might look like.", 'two-bit-alchemy' ) ); ?></p>

		<p><?php esc_html_e( "I wasn't asking for a finished commission. I wasn't expecting him to spend hours drawing something for a random guy who had appeared in his inbox.", 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'As best I can remember, I told him I would be absolutely enthralled with a quick sketch on a cocktail napkin.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'And somehow, he answered.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( "Charlie was in London with a layover and some time to kill. He said he'd see what he could do.", 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'I had offered to pay him for his time. He declined and casually suggested that I make a donation somewhere instead.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'So I donated $75 to the American Cancer Society in his name.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'Then I let it go.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'I had no idea whether anything would actually come of it, and frankly, getting a personal response from an artist whose work I admired was already more than I had expected.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'A few weeks later, a large envelope arrived with a return address in the United Kingdom.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( "Inside wasn't a cocktail napkin.", 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'It was an actual page from the sketchbook Charlie traveled with.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'And on it were my Amish zombies.', 'two-bit-alchemy' ); ?></p>

		<p><?php echo wp_kses_post( __( 'Two of them, standing together in that unmistakable black-and-white <em>Walking Dead</em> world, rendered by the same hand responsible for countless pages I had spent years reading.', 'two-bit-alchemy' ) ); ?></p>

		<p><?php esc_html_e( 'He signed it.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'I framed it.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'And ultimately, I never got the tattoo.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( "As much as I loved the drawing, it didn't translate into the tattoo I had imagined quite as well as I'd hoped. That turned out not to matter very much.", 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'I had started with a weird tattoo idea and an email that I had no particular reason to believe would ever be answered.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'What came back was considerably better: an original piece of artwork from someone whose work I greatly admired, created because I asked politely, he happened to have some time to kill, and a complete stranger decided to be extraordinarily generous with it.', 'two-bit-alchemy' ); ?></p>

		<p><?php esc_html_e( 'It has been hanging on my wall ever since.', 'two-bit-alchemy' ); ?></p>
	</section>

	<section class="project-section project-exhibit__next" aria-labelledby="artifact-related-title">
		<h2 id="artifact-related-title"><?php esc_html_e( 'Related Content', 'two-bit-alchemy' ); ?></h2>
		<div class="related-exhibit-list">
			<article class="related-exhibit-card">
				<h3><a href="<?php echo esc_url( home_url( '/cabinet/' ) ); ?>"><?php esc_html_e( 'Return to the Cabinet', 'two-bit-alchemy' ); ?></a></h3>
				<p><?php esc_html_e( 'The Cabinet gathers objects, references, photographs, and artifacts that help explain the projects, observations, and stories across Two-Bit Alchemy.', 'two-bit-alchemy' ); ?></p>
			</article>
		</div>
	</section>
</article>

<?php
get_template_part( 'template-parts/site-footer' );

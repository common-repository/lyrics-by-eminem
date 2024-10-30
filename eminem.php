<?php

/*
Plugin Name: Lyrics by Eminem
Description: This is just a funny little plugin that displays lyrics from Eminems 'My name is'. Just like Hello Dolly but with Slim Shady flow. 
Author: David Siemers Webdesign
Version: 1.0.4
Author URI: https://davidsiemers.de/
*/

function eminem_lines() {
	$lines = "
Hi! My name is Chika-chika Slim Shady
Excuse me Can I have the attention of the class for one second
Hi kids! Do you like violence?
Wanna see me stick Nine inch Nails, through each one of my eyelids?
Wanna copy me and do exactly like I did?
Try acid and get fucked up worse that my life is?
My brain's dead weight, I'm tryin' to get my head straight
But I can't figure out which Spice Girl I want to impregnate
And Dr. Dre said 'Slim Shady you a base-head!' Uh-uh!
So why's your face red? Man you wasted!
Well since age twelve, I've felt like I'm someone else
Cause I hung my original self from the top bunk with a belt
Got pissed off and ripped Pamela Lee's tits off
And smacked her so hard I knocked her clothes backwards like Kris Kross
I smoke a fat pound of grass and fall on my ass, faster than a fat bitch
Come here, slut!
Shady, wait a minute, that's my girl, dawg!
I don't give a fuck, God sent me to piss the world off!
My English teacher wanted to flunk me in Junior High
Thanks a lot, next semester I'll be thirty five
I smacked him in his face with an eraser
Chased him with a stapler, stapled his nuts to a stack of papers
Walked in the strip club, had my jacket zipped up
Flashed the bartender, then stuck my dick in the tip cup
Extraterrestrial, running over pedestrians in a space ship
While they screamin' at me 'Let's just be friends!'
Ninety-nine percent of my life I was lied to
I just found out my mom does more dope than I do
I told her I'd grow up to be a famous rapper
Make a record about doin drugs and name it after her
You know you blew up when the women rush your stands
Try to touch your hands like some screamin' Usher fans
This guy at White Castle asked for my autograph
So I signed it 'Dear Dave, thanks for the support, asshole!'
Stop the tape! This kid needs to be locked away!
Dr. Dre, don't just stand there, operate!
I'm not ready to leave, it's too scary to die
I'll have to be carried inside the cemetery and buried alive
Am I comin' or goin'? I can barely decide
I just drank a fifth of vodka, dare me to drive?
All my life I was very deprived
I ain't had a woman in years and my palms are too hairy to hide
Clothes ripped like the Incredible Hulk
I spit when I talk, I'll fuck anything that walks
When I was little I used to get so hungry I would throw fits
How you gonna breast feed me, Mom? You ain't got no tits!
I lay awake and strap myself in the bed
With a bulletproof vest on and shoot myself in the head
I'm steamin' mad, and by the way when you see my dad?
Tell him that I slit his throat, in this dream I had
";

	// Split every line
	$lines = explode( "\n", $lines );

	// Choose random line
	return wptexturize( $lines[ mt_rand( 0, count( $lines ) - 1 ) ] );
}

// Echo lines
function eminem() {
	$chosen = eminem_lines();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="eminem"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'lines from Eminem: ' ),
		$lang,
		$chosen
	);
}

add_action( 'admin_notices', 'eminem' );

function css() {
	echo "
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Nothing+You+Could+Do&display=swap');
	#eminem {
		font-family: 'Nothing You Could Do', cursive;
		font-weight: bold;
		float: right;
		font-size: 18px;
		color: grey;
		padding: 0px;
		margin: 10px 10px 5px 0px;
		animation-name: eminemanimation;
		animation-duration: 2s;
		}

		@keyframes eminemanimation {
		  0%   {font-size: 2px;}
		  100% {font-size: 18px;}
		}
	</style>
	";
}

add_action( 'admin_head', 'css' );

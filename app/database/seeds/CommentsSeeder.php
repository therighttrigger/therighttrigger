<?php
class CommentsSeeder extends Seeder {

	public function run() {
		$comment = new Comment();
		$comment->name = "Barack Obama";
		$comment->message = "Now uhhhh....let me be clear...uhhh";
		$comment->save();
	}
}
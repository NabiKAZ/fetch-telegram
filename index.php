<?php
$channel_name = 'InjaGhatie';
$post_start = 164;
$post_end = 174;

echo "Fetch channel: \"$channel_name\"\n";
@mkdir($channel_name);
for($i=$post_start; $i<=$post_end; $i++) {
	echo "Get post #$i ... ";
	$contents = file_get_contents("https://t.me/$channel_name/$i?embed=1");
	preg_match('/<video.*src="(.*?)".*>/', $contents, $match);
	if (isset($match[1])) {
		echo "Download video... ";
		$video = file_get_contents($match[1]);
		file_put_contents($channel_name.'/'.$i.'.mp4', $video);
		echo "Saved.\n";
	} else {
		echo "Not found video.\n";
	}
}

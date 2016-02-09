<?php
header("Content-type: text/xml");
$url = "http://www.aemet.es/xml/municipios/" . $_POST['xml'];

libxml_set_streams_context(
	stream_context_create(
		array(
			'http' => array(
				'user_agent' => 'php'
			)
		)
	)
);

$dom = new DOMDocument;
$dom->load($url);
echo $dom->saveXml();
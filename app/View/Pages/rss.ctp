<?
		foreach ($lessons as $lesson) {
			$url = str_replace(" ", "%20", $lesson['Lesson']['url']);
			echo '<item>

			<title>'.$lesson['Lesson']['title'].'</title>

			<itunes:author>'.$lesson['Lesson']['author'].'</itunes:author>


			<itunes:summary>Predicaciones Amistad Cristiana Madrid</itunes:summary>

			<enclosure url="http://www.amistadcristianamadrid.org/admin/mp/'.$url.'" length="8727310" type="audio/mp3" />

			<guid>http://www.amistadcristianamadrid.org/admin/mp/'.$url.'</guid>

			<pubDate>'.$lesson['Lesson']['date'].'</pubDate>

			<itunes:duration>30:00</itunes:duration>

			<itunes:keywords>cristiana, madrid, amistad, iglesia, Predicaciones</itunes:keywords>

			</item>';
		}
?>
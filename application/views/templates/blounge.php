<div id = "wrapper">
	<img id="logo" src="images/b-lounge-logo.jpg"/>
		<div id="menu">
			<ul>
				<li id="blounge">B-LOUNGE</li>
				<li id="speisen">SPEISEN</li>
				<li id="getranke">GETRÄNKE</li>
				<li id="neues">NEUES</li>
				<li id="newsletter">NEWSLETTER</li>
				<li id="kontakt">KONTAKT</li>
				<li id="partner">PARTNER</li>

			</ul>
		</div>
		<div class="back">
		<img id ="back_1" src="images/sek7.jpg"/>
		<img class="hidden" id ="back_2" src="images/sek2.jpg"/>
		<img class="hidden" id ="back_3" src="images/sss1.jpg"/>
		<img class="hidden" id ="back_4" src="images/sek1.jpg"/>
		<img class="hidden" id ="back_5" src="images/sek6.jpg"/>
		<img class="hidden" id ="back_6" src="images/sek4.jpg"/>
		<img class="hidden" id ="back_7" src="images/sek4.jpg"/>
		<img class="hidden" id ="back_8" src="images/sek10.jpg"/>
		<img class="hidden" id ="back_9" src="images/sek11.jpg"/>
		</div>
			<div id="left_side">
				<img src="images/jre.png"/></br>
					<p>HILL - Restaurant</p>
				<p>Sieveringer Straße 135 – 137</p>
				<p>1190 - Wien</p>
				<p>t: 01 320 1111</p>
				<p>f: 01 320 1111 99</p>
				<p>e:office@hill-restaurant.at</p>
				<p>Dienstag – Samstag von 17:00 – 00:00 </p>
				<p>Küche bis 22:30</p>
				<p>Sonntag, Montag und Feiertags geschlossen</p>

			</div>	
			<div id="guestbook">
					<ul>
						<li id="gestbuch">Gästebuch | </li>
						<li id="impressum">Impressum</li>
					</ul>
				</div>
				<div id="content" class="content">
				<div class="blounge">
				<img class="home_img" src="images/home_img.jpg" /></br>
				<h1>B-Lounge</h1>
				<p>Ein außergewöhnliches Café an einem außergewöhnlichen Ort.</p>
				<p>Die zwei prachtvollen Palais, das Untere und das Obere Belvedere, wurden im 18. Jahrhundert als Sommerresidenz für Prinz Eugen von Savoyen (1663-1736) erbaut. Die Palais und der großzügig angelegte  Garten zählen heute zu den weltweit schönsten Barockschlössern und zu einem der beliebtesten österreichischen Museen.</p>
				<p>Kaffee und Kunstgenuss – die perfekte Ergänzung </p>
				<p>In der Österreichischen Galerie Belvedere betreibt das Restaurant Hill das Café mit dem Namen B-Lounge für all jene, die Kunst mit Kulinarik verbinden wollen. Nach einem Museumsbesuch können die Gäste hier nicht nur Kaffee und köstliche hausgemachte Torten genießen, unser Küchenchef kreiert für Sie ständig wechselnde Gerichte die Saisonal abgestimmt werden.</p>

				</div>
				<div class="speisen hidden">
				<h1>Speisen</h1></br>
				<p>Hier wird Ihnen das Wasser im Mund zusammen laufen.<p/>

				</br></br>
				<a href="pdf/speisekarte.pdf">Speisekarte.pdf</a>
			</div>
			<div  class="getr hidden">
				<h1>Wein & Getranke</h1>
				<p>Ach hier kommt nichts auf die Karte, das unseren strengen Qualitätsansprüchen  nicht Genüge tut.</p>
				<p>Die Weinkarte umfasst namhafte Winzer aus Österreich, Italien, Spanien und Frankreich.</p></br></br>
				<a href="pdf/weinkarte.pdf">Weinkarte.pdf</a>
			</div>
			<div class="hidden neues">
				<h1>Neues</h1>
				<?php
					for ($i=0; $i <count($news) ; $i++) { 
						
					
				?>
				<span><h2><?php echo $news[$i]['Title']; ?></h2></span>
				<span><?php echo $news[$i]['Text']; ?></span>
				<hr>
				<?php
			}
			?>
			</div>
				<form class="newsletter hidden form-horizontal">
					<h1>Newsletter</h1></br>
					<div class="control-group">
					<label class="control-label">Titel:</label>
						<div class="controls">
					<input id="titel_news" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Name:</label>
						<div class="controls">
					<input id="name_news" name="name_news" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Email:</label>
						<div class="controls">
					<input id="email_news" name="email_news" type="text"></input>
						</div>
					</div>
					<label>Ich möchte gerne über Neuigkeiten informiert werden</label>
					<label class="send" id="add_mail">SEND</label>
					<label class="sind">*sind Pflichtfelder</label>
				</form>

				<form class="guestbook hidden form-horizontal">
					<h1>Guestbook</h1></br>
					<div class="control-group">
					<label class="control-label">Titel:</label>
						<div class="controls">
					<input id="titel_g" name="titel_g"type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Name:</label>
						<div class="controls">
					<input id="name_g" type="text" name="name_g"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Email:</label>
						<div class="controls">
					<input id="email_g" name="email_g" type="text"></input>
						</div>
					</div>
					<textarea id="comment_g"></textarea>
						<br/>
						<br/>
					<label class="send" id="add_comment">SEND</label>

				</form>

				<form class="kontakt hidden form-horizontal">
					<h1>Kontakt</h1></br>
					<div class="control-group">
					<label class="control-label">Titel:</label>
						<div class="controls">
					<input id="titel_kon" name="titel_kon" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Name:</label>
						<div class="controls">
					<input id="name_kon" name="name_kon" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Email:</label>
						<div class="controls">
					<input id="email_kon" name="email_kon" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Personenanzahl:</label>
						<div class="controls">
					<input id="persone_kon" name="persone_kon" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">Specielle Wünsche:</label>
						<div class="controls">
					<input id="wunsche_kon" name="wunsche_kon" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Telefon:</label>
						<div class="controls">
					<input id="telefon_kon" name="telefon_kon" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Uhrzeit:</label>
					<div class="controls">
						<input id="uhrzeit_kon" name="uhrzeit_kon" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Datum:</label>
					<div class="controls">
						<input id="datum_kon" name="datum_kon" type="text"></input>
						</div>
					</div>
					<div class="control-group">
					<label class="control-label">*Raucher:</label>
					<div class="controls">
						<input id="raucher_kon" name="raucher_kon" type="text"></input>
						</div>
					</div>
					
					<textarea rows="4" cols="50" id="comment" name="comment"></textarea>
						<br/>
						<br/>
					<label class="send" id="send_kon" name="send_mail">SEND</label>
					<label class="sind">*sind Pflichtfelder</label>
					
				</form>
				<div class="partner hidden">
					<h1>Partner</h1>
					<img src="images/voslauer.png"/>
					<img src="images/stift.png"/>
					<img src="images/carpediem.png"/>
					<img src="images/trumer.jpg"/>
					<img src="images/cult.jpg"/>

				</div>
				<div class="impressum hidden">
					
					<h1>Impressum</h1>
					<p>S&N Gastronomie Betriebs GmbH</br>
					Sieveringer Straße 137</br>
					1190 Wien</p>
					<p>Filiale B- Lounge</br>
Rennweg 6</br>
1030 Wien</p>
					<p>Firmenbuch :   FN333435x</p>
					<p>UID.:   ATU65216116</p>
					<p>Gerichtsstand: Handelsgericht Wien </p></br>
					<p>Haftungsausschluss:</p>
					<p>1. Inhalt des Onlineangebotes Der Autor übernimmt keinerlei Gewähr für die Aktualität, Korrektheit, Vollständigkeit oder Qualität der bereitgestellten Informationen. Haftungsansprüche gegen den Autor, welche sich auf Schäden materieller oder ideeller Art beziehen, die durch die Nutzung oder Nichtnutzung der dargebotenen Informationen bzw. durch die Nutzung fehlerhafter und unvollständiger Informationen verursacht wurden, sind grundsätzlich ausgeschlossen, sofern seitens des Autors kein nachweislich vorsätzliches oder grob fahrlässiges Verschulden vorliegt. Alle Angebote sind freibleibend und unverbindlich. Der Autor behält es sich ausdrücklich vor, Teile der Seiten oder das gesamte Angebot ohne gesonderte Ankündigung zu verändern, zu ergänzen, zu löschen oder die Veröffentlichung zeitweise oder endgültig einzustellen.</p>
					<p>2. Verweise und Links Bei direkten oder indirekten Verweisen auf fremde Webseiten ("Hyperlinks"), die außerhalb des Verantwortungsbereiches des Autors liegen, würde eine Haftungsverpflichtung ausschließlich in dem Fall in Kraft treten, indem der Autor von den Inhalten Kenntnis hat und es ihm technisch möglich und zumutbar wäre, die Nutzung im Falle rechtswidriger Inhalte zu verhindern. Der Autor erklärt hiermit ausdrücklich, dass zum Zeitpunkt der Linksetzung keine illegalen Inhalte auf den zu verlinkenden Seiten erkennbar waren. Auf die aktuelle und zukünftige Gestaltung, die Inhalte oder die Urheberschaft der gelinkten/verknüpften Seiten hat der Autor keinerlei Einfluss. Deshalb distanziert er sich hiermit ausdrücklich von allen Inhalten aller gelinkten/verknüpften Seiten, die nach der Linksetzung verändert wurden. Diese Feststellung gilt für alle innerhalb des eigenen Internetangebotes gesetzten Links und Verweise sowie für Fremdeinträge in vom Autor eingerichteten Gästebüchern, Diskussionsforen und Mailinglisten. Für illegale, fehlerhafte oder unvollständige Inhalte und insbesondere für Schäden, die aus der Nutzung oder Nichtnutzung solcherart dargebotener Informationen entstehen, haftet allein der Anbieter der Seite, auf welche verwiesen wurde, nicht derjenige, der über Links auf die jeweilige Veröffentlichung lediglich verweist.</p>
					<p>3. Urheber- und Kennzeichenrecht Der Autor ist bestrebt, in allen Publikationen die Urheberrechte der verwendeten Grafiken, Tondokumente, Videosequenzen und Texte zu beachten, von ihm selbst erstellte Grafiken, Tondokumente, Videosequenzen und Texte zu nutzen oder auf lizenzfreie Grafiken, Tondokumente, Videosequenzen und Texte zurückzugreifen. Alle innerhalb des Internetangebotes genannten und ggf. durch Dritte geschützten Marken- und Warenzeichen unterliegen uneingeschränkt den Bestimmungen des jeweils gültigen Kennzeichenrechts und den Besitzrechten der jeweiligen eingetragenen Eigentümer. Allein aufgrund der bloßen Nennung ist nicht der Schluss zu ziehen, dass Markenzeichen nicht durch Rechte Dritter geschützt sind!Das Copyright für veröffentlichte, vom Autor selbst erstellte Objekte bleibt allein beim Autor der Seiten. Eine Vervielfältigung oder Verwendung solcher Grafiken, Tondokumente, Videosequenzen und Texte in anderen elektronischen oder gedruckten Publikationen ist ohne ausdrückliche Zustimmung des Autors nicht gestattet.</p>
					<p>4. Datenschutz Sofern innerhalb des Internetangebotes die Möglichkeit zur Eingabe persönlicher oder geschäftlicher Daten (E-Mail-Adressen, Namen, Anschriften) besteht, so erfolgt die Preisgabe dieser Daten seitens des Nutzers auf ausdrücklich freiwilliger Basis. Die Inanspruchnahme und Bezahlung aller angebotenen Dienste ist - soweit technisch möglich und zumutbar - auch ohne Angabe solcher Daten bzw. unter Angabe anonymisierter Daten oder eines Pseudonyms gestattet. Die Nutzung der im Rahmen des Impressums oder vergleichbarer Angaben veröffentlichten Kontaktdaten wie Postanschriften, Telefon- und Faxnummern sowie E-Mail-Adressen durch Dritte zur Übersendung von nicht ausdrücklich angeforderten Informationen ist nicht gestattet. Rechtliche Schritte gegen die Versender von sogenannten Spam-Mails bei Verstößen gegen dieses Verbot sind ausdrücklich vorbehalten.</p>
					<p>5.Rechtswirksamkeit dieses Haftungsausschlusses Dieser Haftungsausschluss ist als Teil des Internetangebotes zu betrachten, von dem aus auf diese Seite verwiesen wurde. Sofern Teile oder einzelne Formulierungen dieses Textes der geltenden Rechtslage nicht, nicht mehr oder nicht vollständig entsprechen sollten, bleiben die übrigen Teile des Dokumentes in ihrem Inhalt und ihrer Gültigkeit davon unberührt.</p>
				</div>
				
				</div>	
</div>

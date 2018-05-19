<?php
/**
*
* @package phpBB Extension - Digests
* @copyright (c) 2018 Mark D. Hamill (mark@phpbbservices.com)
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

global $phpbb_container;

$config = $phpbb_container->get('config'); 
$helper = $phpbb_container->get('phpbbservices.digests.common');

$lang = array_merge($lang, array(
	'DIGESTS_WEEKDAY' 					=> 'Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
));

$weekdays = explode(',', $lang['DIGESTS_WEEKDAY']);

$lang = array_merge($lang, array(
	'PLURAL_RULE'											=> 1,

	'DIGESTS_ALL'											=> 'Alle Nutzer',
	'DIGESTS_ALL_ALLOWED_FORUMS'							=> 'Alle Themenbereiche für die Leseberechtigung besteht',
	'DIGESTS_ALL_HOURS'										=> 'Alle Zeiten',
	'DIGESTS_ALL_TYPES'										=> 'Alle Zusammenfassungsarten',
	'DIGESTS_ALL_SUBSCRIBED'								=> array(
																1 => 'Es wurde ein Abonnement für %d Nutzer erstellt',
																2 => 'Es wurden Abonnements für %d Nutzer erstellt',
															),
	'DIGESTS_ALL_UNSUBSCRIBED'								=> array(
																1 => 'Die Abonnements von %d Nutzer wurden gelöscht',
																2 => 'Die Abonnements von insgesamt %d Nutzern wurden gelöscht',
															),
	'DIGESTS_APPLY_TO'										=> 'Abonniere',
	'DIGESTS_AVERAGE'										=> 'Durchschnitt',
	'DIGESTS_BALANCE_APPLY_HOURS'							=> 'Last-Verteilung für gewählte Zeiten starten',
	'DIGESTS_BALANCE_LOAD'									=> 'Last-Verteilung',
	'DIGESTS_BALANCE_HOURS'									=> 'Last-Verteilung für diese Zeiten durchführen',
	'DIGESTS_BASED_ON'										=> '(UTC%+d)',
	'DIGESTS_CURRENT_VERSION_INFO'							=> 'Aktuelle Version: <strong>%s</strong>',
	'DIGESTS_CUSTOM_STYLESHEET_PATH'						=> 'Pfad zum Custom-Stylesheet',
	'DIGESTS_CUSTOM_STYLESHEET_PATH_EXPLAIN'				=> 'Dieser Pfadangabe ist nur von Bedeutung, wenn weiter oben auch die Verwendung des Custom-Sylesheet aktiviert ist. Das Stylesheet wird dann für alle HTML-Zusammenfassungen verwendet. Es muss der relative Pfad zum phpBB-styles-Verzeichnis angegeben werden. Es ist sinnvoll, dafür ein eigenes Unterverzeichnis innerhalb des Themes anzulegen. Anmerkung: Es fällt in deinen eigenen Zuständigkeitsbereich, selbst ein solches Stylesheet zu entwickeln und es unter dem hier angegebenen Pfad und Namen auf den Server zu hinterlegen. Beispiel: prosilver/theme/digest_stylesheet.css. Informationen zum Erstellen von Stylesheets findest du <a href="http://www.w3schools.com/css/">hier</a>.',
	'DIGESTS_COLLAPSE'										=> 'Einklappen',
	'DIGESTS_COMMA'											=> ', ',		// Used  in salutations and to separate items in lists
	'DIGESTS_DEFAULT'										=> 'Abonnement mit Standard-Einstellungen anlegen',
	'DIGESTS_DAILY_ONLY'									=> 'Nur tägliche Zusammenfassung',
	'DIGESTS_ENABLE_AUTO_SUBSCRIPTIONS'						=> 'Automatisches Abonnieren aktivieren',
	'DIGESTS_ENABLE_AUTO_SUBSCRIPTIONS_EXPLAIN'				=> 'Um bei neuen Forumsnutzern standardmäßig nach der Registrierung ein aktiviertes Abonnement zu bewirken, muss hier &rsquo;Ja&rsquo; ausgewählt sein. Es werden dabei die Standard-Vorgaben der Administration verwendet (Zu finden unter &rsquo;Standard-Nutzerkonfiguration&rsquo;). Das Aktivieren dieser Option bewirkt <em>kein</em> Abonnement bei Nutzern, deren Abonnement beendet worden ist, die inaktiv sind oder die bei der Registrierung die E-Mail-Zusammenfassung deaktiviert haben. Einzelne Nutzer lassen sich aber noch individuell mithilfe der Abonnementverwaltung hinzufügen oder pauschal mithilfe des Massen-Abonnements.',
	'DIGESTS_ENABLE_CUSTOM_STYLESHEET'						=> 'Custom-Stylesheet aktivieren',
	'DIGESTS_ENABLE_CUSTOM_STYLESHEET_EXPLAIN'				=> 'Wenn kein Custom-Stylesheet eingerichtet ist, wird bei der Erzeugung aller HTML-Zusammenfassungen jeweils das Standard-Stylesheet verwendet, welches zum Style gehört, der im jeweiligen Nutzer-Profil ausgewählt wurde.',
	'DIGESTS_ENABLE_LOG'									=> 'Alle Aktivitäten der Digest-Extension mit im Admin-Log erfassen',
	'DIGESTS_ENABLE_LOG_EXPLAIN'							=> 'Wenn diese Option aktiviert wurde, werden alle Aktivitäten der Extension ins Administrations-Protokoll geschrieben (zu finden im Wartungstab). Das kann bei der Fehlersuche sehr hilfreich sein, weil es genau anzeigt, welche Schritte der Digest-Mailer für welche Abonnenten durchgeführt hat und zu welchem Zeitpunkt das war. Daraus resultiert allerdings ziemlich schnell ein extrem langes Admin-Log, denn der Digest-Mailer erzeugt mindestens zwei Einträge in jeder Stunde. Hinweis: Fehlermeldungen, Ausnahmezustände und Warnungen werden unabhängig von dieser Einstellung immer ins Protokoll geschrieben.',
	'DIGESTS_ENABLE_SUBSCRIBE_UNSUBSCRIBE'					=> 'Massenabonnement ermöglichen',
	'DIGESTS_ENABLE_SUBSCRIBE_UNSUBSCRIBE_EXPLAIN'			=> 'Wenn hier &rsquo;Ja&rsquo; ausgewählt wurde, wird beim Anklicken von &rsquo;Absenden&rsquo; die ausgewählte Aktion für alle Nutzer unumkehrbar durchgeführt. Bitte nur mit äußerster Vorsicht einsetzen!',
	'DIGESTS_EXCLUDE_FORUMS'								=> 'Diese Themenbereiche immer ausschließen',
	'DIGESTS_EXCLUDE_FORUMS_EXPLAIN'						=> 'Hier können die IDs der Themenbereiche ausgewählt werden, die von allen Zusammenfassungen generell ausgeschlossen werden sollen. Mehrere Forum-IDs können, durch Kommas getrennt, zusammen angegeben werden. 0 bedeutet, dass gar keine Themenbereich ausgeschlossen werden. Um die Themenbereichs-ID herauszufinden, muss man nach dem &rsquo;F&rsquo;-Parameter in den URL-Feldern suchen. Beispiel: http://www.example.com/phpBB3/viewforum.php?f=1. Bitte nicht die IDs von Kategorien verwenden! <i>Diese Option wird ignoriert, wenn nur die Lesezeichen-Themen vom Nutzer ausgewählt wurden.</i>',
	'DIGESTS_EXPAND'										=> 'Ausklappen',
	'DIGESTS_FREQUENCY_EXPLAIN'								=> 'Wöchentliche Zusammenfassungen werden immer an folgendem Wochentag versandt: ' . $weekdays[$config['phpbbservices_digests_weekly_digest_day']] . '. Monatliche Zusammenfassungen werden jeweils am Ersten des Monats versandt. Der Wochentag wird jeweils auf Basis der koordinierten Weltzeit (UTC) ermittelt.',
	'DIGESTS_FORMAT_FOOTER' 								=> 'Digest-Format',
	'DIGESTS_FROM_EMAIL_ADDRESS'							=> 'Absendermailadresse',
	'DIGESTS_FROM_EMAIL_ADDRESS_EXPLAIN'					=> 'Wenn die E-Mail-Zusammenfassung beim Nutzer eintrifft, erscheint diese E-Mailadresse im Absender-Feld (From). Wird das Feld leer gelassen, so wird automatisch die Kontaktmailadresse des Boards verwendet. Diese Adresse sollte mit Bedacht gewählt werden, da Adressen von einer fremden Domain schon vom absendenden Mailserver oder dann vom empfangenden Server leicht als spamverdächtig eingestuft und herausgefiltert werden könnten.',
	'DIGESTS_FROM_EMAIL_NAME'								=> 'Absendername',
	'DIGESTS_FROM_EMAIL_NAME_EXPLAIN'						=> 'Hier kann der Name festgelegt werden, der beim Empfänger als Absender der E-Mail-Zusammenfassungen angezeigt werden soll. Wenn das Feld frei gelassen wird, identifiziert der Mailer sich als Mail-Robot.',
	'DIGESTS_HAS_UNSUBSCRIBED'								=> 'Abonnement eigenhändig beendet',
	'DIGESTS_HOUR_SENT'										=> 'Sendeuhrzeit (UTC%+d)',
	'DIGESTS_IGNORE'										=> 'Keine globale Änderung vornehmen',
	'DIGESTS_ILLOGICAL_DATE'								=> 'Dein Simulationsdatum ist unlogisch (z.B. 31. Februar). Bitte korrigieren und erneut absenden.',
	'DIGESTS_INCLUDE_ADMINS'								=> 'Schließe Administratoren mit ein',
	'DIGESTS_INCLUDE_ADMINS_EXPLAIN'						=> 'Dadurch werden neben den Standard-Nutzern auch alle Administratoren beim Erstellen oder Beeden des Massen-Abonnements mit eingeschlossen.',
	'DIGESTS_INCLUDE_FORUMS'								=> 'Diese Themenbereich immer mit einschließen',
	'DIGESTS_INCLUDE_FORUMS_EXPLAIN'						=> 'Bitte hier alle Themenbereichs-IDs aufführen, die verpflichtend immer mit in der Zusammenfassung erscheinen sollen. Mehrere IDs werden durch Komma getrennt. Eine 0 bedeutet, dass keine Themenbereiche verpflichtend mit abonniert werden sollen. Um die Themenbereichs-ID herauszufinden, muss man nach dem &ldquo;F&rdquo;-Parameter in den URL-Feldern suchen. Beispiel: http://www.example.com/phpBB3/viewforum.php?f=1. Bitte nicht die IDs von Kategorien verwenden! <i>Diese Option wird ignoriert, wenn nur die Lesezeichen-Themen vom Nutzer ausgewählt wurden.</i>',
	'DIGESTS_LAST_SENT'										=> 'Letzter Versandzeitpunkt',
	'DIGESTS_LIST_USERS'    								=> array(
																	1 => 'Es wird nur ein Nutzer angezeigt ',
																	2 => 'Es werden insgesamt %d Nutzer aufgelistet |',
																),
	'DIGESTS_LOWERCASE_DIGEST_TYPE'							=> 'Kleinschreibung der Zusammenfassungsart',
	'DIGESTS_LOWERCASE_DIGEST_TYPE_EXPLAIN'					=> 'In manchen Sprachen kann es sinnvoll sein, z.B. aus &ldquo;Digest Daily My board name&rdquo; &ldquo;Digest daily of my board name&rdquo;, zu machen. Der erste Buchstabe des Board-Namens wird dabei auch verkleinert.',
	'DIGESTS_MAILER_NOT_RUN'								=> 'Mailer wurde nicht gestartet, weil er nicht aktiviert war.',
	'DIGESTS_MAILER_RAN_SUCCESSFULLY'						=> 'Mailer wurde erfolgreich gestartet.',
	'DIGESTS_MAILER_RAN_WITH_ERROR'							=> 'Bei der Ausführung des Mailers ist ein Fehler aufgetreten. Dabei können jedoch erfolgreich Zusammenfassungen erzeugt worden sein.',
	'DIGESTS_MAILER_SPOOLED'								=> 'Die für diesen Tag und diese Stunde vorgesehenen Zusammenfassungen wurden im store/ext/phpbbservices/digests-Verzeichnis gespeichert.',
	'DIGESTS_MAX_CRON_HOURS'								=> 'Maximale Ausführungsdauer pro Aufruf für den Mailer',
	'DIGESTS_MAX_CRON_HOURS_EXPLAIN'						=> 'Bei einem Dedicated Server oder bei Virtual Hosting Umgebungen kann diese Einstellung normalerweise auf 0 (Null) bleiben, um alle Versandzeitpunkte abzudecken. Läuft das Forum dagegen in einer <strong>Shared Hosting</strong> Umgebung, dann kann die Ausführung des Mailers Fehler verursachen, insbesondere, wenn es dort viele Abonnenten und viele abzudeckende Versandzeitpunkte gibt. Der einfachste Weg zur Vermeidung solcher Probleme ist die <em>Einrichtung eines <a href="https://wiki.phpbb.com/PhpBB3.1/RFC/Modular_cron#Use_system_cron">System-Cronjobs</a></em>. Nur ein System-Cronjob kann den fristgerechten Versand der E-Mail-Zusammenfassung gewährleisten. Andernfalls läuft man Gefahr, dass solche Fehler durch das Erreichen von Obergrenzen in den aufgeteilten Ressourcen eines Shared Hosts verursacht werden. Wenn das vorkommt, und ein System-Cronjob nicht verwendet werden kann, sollte dieser Wert auf 1 gesetzt werden. Eine weitere Erhöhung dieses Wertes kann eventuell darüberhinaus vorgenommen werden, wenn man die Erfahrung gemacht hat, dass mehrere Stunden bis zum Abschluss der Aufgabe nötig sind. <em>Hinweis:</em> Der Versand der Zusammenfassungen kann sich durch eine solche Konfiguration für manche Abonnenten verzögern, weil das Forum immer Nutzerverkehr benötigt, um den Mailer laufen zu lassen.',
	'DIGESTS_MAX_ITEMS'										=> 'Maximale Beitragszahl pro Zusammenfassung',
	'DIGESTS_MAX_ITEMS_EXPLAIN'								=> 'Aus Performance-Gründen kann es sinnvoll sein, hier eine absolute Obergrenze für alle Zusammenfassungen festzulegen. Eine Null bedeutet, dass es kein Beitragslimit gibt und die Zusammenfassungen unendlich groß werden können. Es sind nur ganzzahlige Werte erlaubt. Dabei ist zu bedenken, dass die Größe der Zusammenstellungen auch durch die gewählte Zusammenfassungsart (täglich, wöchentlich, monatlich) und durch andere Voreinstellungen weiter eingeschränkt werden kann.',
	'DIGESTS_MAIL_FREQUENCY' 								=> 'Häufigkeit der E-Mail-Zusammenstellung',
	'DIGESTS_MIGRATE_UNSUPPORTED_VERSION'					=> 'Upgrades des Digests-Mods (for phpBB 3.0) werden nur ab Version 2.2.6 und höher unterstützt. Die hier vorgefundene Version lautet jedoch %s. Die Extension kann deshalb leider nicht hierher migriert werden. Ein Update auf Basis des alten Datenbestandes ist nicht möglich. Unterstützung kann man bei Bedarf jedoch im entsprechenden Forum auf phpbb.com erhalten.',
	'DIGESTS_MONTHLY_ONLY'									=> 'Nur monatliche Zusammenfassung',
	'DIGESTS_NEVER_VISITED'									=> 'Noch nie besucht',
	'DIGESTS_NO_DIGESTS_SENT'								=> 'Keine Zusammenfassung versandt',
	'DIGESTS_NO_MASS_ACTION'								=> 'Es wurde kein Arbeitsvorgang durchgeführt, weil diese Funktion deaktiviert ist',
	'DIGESTS_NOTIFY_ON_ADMIN_CHANGES'						=> 'Nutzer via E-Mail über die vom Administrator geänderten Einstellungen benachrichtigen',
	'DIGESTS_NOTIFY_ON_ADMIN_CHANGES_EXPLAIN'				=> "Die Abonnement-Verwaltung, Last-Verteilung und Massenabonnement-Operationen ermöglichen dem Administrator, Nutzereinstellungen zu verändern. &rsquo;Ja&rsquo; bedeutet, dass eine E-Mail an die entsprechenden Abonnenten verschickt wird, sobald einzelne Punkte ihrer Konfiguration durch den Administrator beeinflusst worden sind.",
	'DIGESTS_NUMBER_OF_SUBSCRIBERS'							=> 'Anzahl von Abonnenten',
	'DIGESTS_PMS_MARK_READ'									=> 'Meine privaten Mitteilungen (PMs) als gelesen markieren, wenn sie in der Zusammenfassung enthalten waren.',
	'DIGESTS_RANDOM_HOUR'									=> 'Zufälliger Zeitpunkt',
	'DIGESTS_REBALANCED'									=> array(
																	1 => 'Während der Lastumverteilung hat gerade %d Abonnent selbst eine Änderung des Sendezeitpunktes vergenommen.',
																	2 => 'Während der Lastumverteilung haben gerade %d Abonnenten selbst eine Änderung des Sendezeitpunktes vergenommen.',
															),
	'DIGESTS_REGISTRATION_FIELD'							=> 'Neuen Nutzern während der Registrierung ermöglichen, eine E-Mail-Zusammenfassung zu abonnieren.',
	'DIGESTS_REGISTRATION_FIELD_EXPLAIN'					=> 'Wenn diese Option aktiviert ist, können Nutzer schon bei Ausfüllen des Registrierungsformulares auswählen, ob sie die E-Mail-Zusammenfassung mit den Standardvorgaben abonnieren möchten. Diese Auswahlmöglichkeit erscheint dort nicht, wenn das &rsquo;Automatische Abonnieren&rsquo; aktiviert ist.',
	'DIGESTS_REPLY_TO_EMAIL_ADDRESS'						=> 'Antwortmailadresse',
	'DIGESTS_REPLY_TO_EMAIL_ADDRESS_EXPLAIN'				=> 'Diese E-Mailadresse erscheint beim Empfänger im REPLY-TO-Feld (Antworten). Wenn das Feld leer ist, wird die Kontaktmailadresse des Boards verwendet. Diese Adresse sollte mit Bedacht gewählt werden, da Adressen von einer fremden Domain schon vom absendenden Mailserver oder dann vom empfangenden Server leicht als spamverdächtig eingestuft und herausgefiltert werden könnten.',
	'DIGESTS_RESET_CRON_RUN_TIME'							=> 'Mailer zurücksetzen',
	'DIGESTS_RESET_CRON_RUN_TIME_EXPLAIN'					=> 'Wenn der Mailer zurückgesetzt wurde, werden bei der nächsten Ausführung nur noch Zusammenfassungen für die aktuelle Stunde erzeugt. Alle Zusammenfassungen in der Warteschlange werden entfernt. Ein Zurücksetzen kann z.B. nach dem Ausprobieren des Zusammenfassungsversandes sinnvoll sein oder wenn der phpBB-interne Cron-Dienst sehr lange nicht gelaufen ist.', 
	'DIGESTS_RUN_TEST'										=> 'Mailer starten',
	'DIGESTS_RUN_TEST_CLEAR_SPOOL'							=> 'store/ext/phpbbservices/digests-Ordner leeren',
	'DIGESTS_RUN_TEST_CLEAR_SPOOL_ERROR'					=> 'Es konnten nicht alle Dateien aus dem store/ext/phpbbservices/digests-Ordner entfernt werden. Ursache könnten fehlende Datei-Rechte oder ein gelöschter Ordner sein. Alle Dateien sollten &rsquo;publicly writeable&rsquo; sein (777 auf Unix-basierten Systemen).',
	'DIGESTS_RUN_TEST_CLEAR_SPOOL_EXPLAIN'					=> '&rsquo;Ja&rsquo; bedeutet, dass alle Dateien im store/ext/phpbbservices/digests-Ordner gelöscht werden. Diese Einstellung ist sinnvoll, um auszuschließen, dass noch auf alte Zusammenfassungen zugegriffen werden kann, während bereits neue Zusammenfassungen in diesem Ordner abgelegt werden. Diese Auswahl sollte auch nach dem Abschluss eines Fehlersuchprozesses möglichst wieder eingestellt werden, da der Inhalt dieses Ordnes öffentlich zugänglich ist. Das Löschen erfolgt jeweils vor dem Erstellen einer neuen Zusammenfassung. Mit dieser Funktion können aber auch sonst jederzeit alte Inhalte des Ordners gelöscht werden. Sie funktioniert nämlich auch unabhängig vom Starten des Mailers, jeweils beim Absenden dieses Formulares.',
	'DIGESTS_RUN_TEST_DAY'									=> 'Simulierter Kalendertag',
	'DIGESTS_RUN_TEST_DAY_EXPLAIN'							=> 'Ganze Zahl zwischen 1 und 31. Wenn Jahr, Monat und Kalendertag in der Zukunft liegen, wird natürlich keine Zusammenfassung erzeugt. Unlogische Eingaben, wie z.B. &rsquo;31. Februar&rsquo; werden nicht akzeptiert.',
	'DIGESTS_RUN_TEST_EMAIL_ADDRESS'						=> 'Testmailadresse',
	'DIGESTS_RUN_TEST_EMAIL_ADDRESS_EXPLAIN'				=> 'Wenn hier eine E-Mailadresse angegeben ist, werden alle Zusammenfassungen des gewünschten Zeitpunktes an diese Adresse gesendet. Ist sie leer, wird bei Bedarf die Kontakt-Emailadresse des Boards als Empfängeradresse verwendet.',
	'DIGESTS_RUN_TEST_HOUR'									=> 'Simulierte Uhrzeit',
	'DIGESTS_RUN_TEST_HOUR_EXPLAIN'							=> 'Die Zusammenfassungen, die für die hier angegebene Stunde geplant sind oder waren, werden im Rahmen der Simulation erzeugt und versandt. Die Zeit bezieht sich auf die Zeitzoneneinstellung des Boards (UTC [+] ' . $helper->make_tz_offset($config['board_timezone']) . '). Liegt dieser Zeitpunkt in der Zukunft, so können die Zusammenfassungen keine Beiträge enthalten. Erlaubt sind ganze Zahlen zwischen 0 und 23.',
	'DIGESTS_RUN_TEST_MONTH'								=> 'Simulierter Monat',
	'DIGESTS_RUN_TEST_MONTH_EXPLAIN'						=> 'Ganzzahliger Wert von 1 bis 12. Meist ist es sinnvoll, den gegenwärtigen Monat zu wählen. Wenn Jahr und Monat in der Zukunft liegen, werden natürlich keine Test-Zusammenfassungen erzeugt.',
	'DIGESTS_RUN_TEST_OPTIONS'								=> 'Definierten Zeitpunkt simulieren',
	'DIGESTS_RUN_TEST_SEND_TO_ADMIN'						=> 'Alle E-Mail-Zusammenfassungen an die unten festgelegte Adresse senden',
	'DIGESTS_RUN_TEST_SEND_TO_ADMIN_EXPLAIN'				=> 'Zu Testzwecken, sollten die Zusammenfassungen nicht an die Nutzeradressen gesendet werden, sondern an eine Testmailadresse. Wenn hier &rsquo;Ja&rsquo; aktiviert ist, aber weiter unten keine entsprechende E-Mailadresse angegeben ist, gehen alle Test-Zusammenfassungen an die Kontaktadresse des Boards(' . $config['board_E-Mail']. '). <em>Achtung:</em> Manche E-Mail-Server werden solche großen Mengen an ähnlichen E-Mails vom selben Absender und in kurzem Zeitintervall als Spam-Versuch oder unangemessene Benutzung zurückweisen. Diese Funktion sollte sehr überlegt ausgewählt werden. Wird hier nämlich &rsquo;Nein&rsquo; selektiert, so werden evtl. alte Zusammenfassungen erneut an die Adressen der Nutzer gesendet, was zur Verwirrung führen kann.',
	'DIGESTS_RUN_TEST_SPOOL'								=> 'Zusammenfassungen als Dateien speichern, anstatt sie als E-Mails zu senden',
	'DIGESTS_RUN_TEST_SPOOL_EXPLAIN'						=> 'Verhindert das Versenden der Zusammenfassungen per E-Mail. Stattdessen wird jede Zusammenfassung in eine Datei im store/ext/phpbbservices/digests-Ordner geschrieben. Die Dateinamen haben dabei folgendes Format: username-yyyy-mm-dd-hh-uniqueID.html oder username-yyyy-mm-dd-hh-uniqueID.txt. (Dateien mit der Endung .txt sind Nur-Text-Zusammenfassungen.) yyyy ist das Jahr, mm der Monat, dd der Kalendertag, hh die Stunde und uniqueID ist ein vom System generierter 16-Byte langer hexadezimaler Zufalls-String. Daten und Uhrzeiten sind dort als UTC angegeben. Wenn weiter unten ein spezieller Simulationszeitpunkt angegeben wird, so wird dieser auch für den Dateinamen verwendet. Diese Dateien können unter der entsprechenden URL im Browser angesehen werden.',
	'DIGESTS_RUN_TEST_TIME_USE'								=> 'Simuliere einen bestimmten Sendezeitpunkt',
	'DIGESTS_RUN_TEST_TIME_USE_EXPLAIN'						=> 'Wenn hier &rsquo;Ja&rsquo; ausgewählt wird, wird die Zusammenstellung für den unten angegebenen Zeitpunkt generiert und versendet. &rsquo;Nein&rsquo; bedeutet dagegen, dass die aktuelle Uhrzeit und das heutige Datum verwendet werden.',
	'DIGESTS_RUN_TEST_YEAR'									=> 'Simuliertes Jahr',
	'DIGESTS_RUN_TEST_YEAR_EXPLAIN'							=> 'Es sind nur Jahre zwischen 2000 und 2030 erlaubt. Es wird empfohlen das aktuelle Jahr zu nehmen. Liegt das Jahr in der Zukunft, so werden natürlich keine Zusammenfassungen erzeugt.',
	'DIGESTS_SEARCH_FOR_MEMBER'								=> 'Teilnehmer suchen',
	'DIGESTS_SEARCH_FOR_MEMBER_EXPLAIN'						=> 'Man kann hier den vollständigen Nutzernamen oder auch nur einen Teil davon eingeben. Anschließend mit Return oder Enter quittieren. Um alle Nutzer zu sehen, das Feld leer lassen. Die Suche ist &rsquo;nicht case sensitive&rsquo;.',
	'DIGESTS_SELECT_FORUMS_ADMIN_EXPLAIN'					=> 'In der Auswahlliste tauchen nur die Themenbereiche auf, für die der Nutzer auch eine Leseberechtigung hat. Wenn Bedarf besteht, dem Nutzer auch Beiträge aus hier nicht mit aufgeführten Themenbereichen zukommen zu lassen, muss dafür eine entsprechende Änderung in den Benutzer- oder Gruppenrechten vorgenommen werden.',
	'DIGESTS_SHOW'											=> 'Anzeigen',
	'DIGESTS_SHOW_EMAIL'									=> 'E-Mailadresse im Log anzeigen',
	'DIGESTS_SHOW_EMAIL_EXPLAIN'							=> 'Wenn diese Option aktiviert ist, wird zusätzlich zum Nutzernamen auch die E-Mailadresse des Nutzers im Administrationsprotokoll mit aufgeführt. Gerade im Zusammenhang mit Mailer-Problemen kann diese Funktion bei der Fehlersuche hilfreich sein.',
	'DIGESTS_SHOW_FORUM_PATH'								=> 'Hierarchische Pfade in der Zusammenfassung anzeigen',
	'DIGESTS_SHOW_FORUM_PATH_EXPLAIN'						=> 'Bei Aktivierung dieser Option wird der komplette hierarchische Pfad aus Kategorie, Forum und Unterforum angezeigt, z.B. &ldquo;Kategorie 1 :: Forum 1 :: Kategorie A :: Forum B&rdquo;. Im anderen Fall wird nur der Forenname angezeigt: &ldquo;Forum B&rdquo;',
	'DIGESTS_SORT_ORDER'									=> 'Sortierreihenfolge',
	'DIGESTS_STOPPED_SUBSCRIBING'							=> 'Abonnement gestoppt',
	'DIGESTS_STRIP_TAGS'									=> 'Auszuschließende HTML-Tags',
	'DIGESTS_STRIP_TAGS_EXPLAIN'							=> 'Manche HTML-Tags können in den E-Mail-Zusammenfassungen Probleme verursachen. Mail-Server können die Weiterleitung unterbinden, den Absender über Blacklisten blockieren oder die Zusammenfassungen in den Spamverdachtsordner verschieben. Schreibe die exakten Bezeichnungen der auszuschließenden HTML-Tags (ohne &lt;- oder &gt;-Zeichen) durch Kommas getrennt hintereinander. Um z.B. video and iframe-Tags zu entfernen, schreibt man &ldquo;video,iframe&rdquo; in dieses Feld. Häufig verwendete Tags, wie h1, p und div sollten hier vermieden werden, da sie für ein fehlerfreies Rendern der Zusammenfassungen benötigt werden.',
	'DIGESTS_SUBSCRIBE_EDITED'								=> 'Deine Konfiguration des E-Mail-Zusammensfassungsversandes wurde geändert.',
	'DIGESTS_SUBSCRIBE_SUBJECT'								=> 'Du erhältst ab jetzt regelmäßig Zusammenfassungen der Forumsbeiträge per E-Mail an die in deinem Profil hinterlegte Adresse.',
	'DIGESTS_SUBSCRIBE_ALL'									=> 'Überall Abonnements anlegen (sonst löschen)',
	'DIGESTS_SUBSCRIBE_ALL_EXPLAIN'							=> 'Achtung: &rsquo;Nein&rsquo; bedeutet, dass alle Abonnements gelöscht werden. Bitte mit Bedacht auswählen!',
	'DIGESTS_SUBSCRIBE_LITERAL'								=> 'Abonnieren',
	'DIGESTS_SUBSCRIBED'									=> 'Abonniert',
	'DIGESTS_SUBSCRIBERS_DAILY'                           	=> 'Tägliche Abonnenten',
	'DIGESTS_SUBSCRIBERS_WEEKLY'                           	=> 'Wöchentliche Abonnenten',
	'DIGESTS_SUBSCRIBERS_MONTHLY'                           => 'Monatliche Abonnenten',
	'DIGESTS_UNSUBSCRIBE'									=> 'Abonnement beenden',
	'DIGESTS_UNSUBSCRIBE_SUBJECT'							=> 'Du erhältst ab jetzt keine E-Mail-Zusammenstellungen mehr',
	'DIGESTS_UNSUBSCRIBED'									=> 'Noch nie abonniert',
	'DIGESTS_USER_DIGESTS_CHECK_ALL_FORUMS'					=> 'Sollen alle Themenbereiche standardmäßig ausgewählt werden?',
	'DIGESTS_USER_DIGESTS_MAX_DISPLAY_WORDS'				=> 'Maximal angezeigte Wortanzahl pro Beitrag',
	'DIGESTS_USER_DIGESTS_MAX_DISPLAY_WORDS_EXPLAIN'		=> '-1 bedeutet dass immer der komplette Beitrag wiedergegeben wird. Null (0) bedeutet dagegen, dass gar kein Beitragsinhalt wiedergegeben wird.',
	'DIGESTS_USER_DIGESTS_PM_MARK_READ'						=> 'Private Nachrichten als gelesen markieren, wenn sie in der Zusammenfassung erscheinen',
	'DIGESTS_USER_DIGESTS_REGISTRATION'						=> 'Nutzer können bereits bei der Registrierung die Zusammenfassung abonnieren',
	'DIGESTS_USERS_PER_PAGE'								=> 'Nutzer pro Seite',
	'DIGESTS_USERS_PER_PAGE_EXPLAIN'						=> 'Hier wird eingestellt wieviele Nutzer pro Seite in der Abonnement-Verwaltung angezeigt werden sollen. Basierend auf PHP max_input_vars, sollte das auf ' . floor((ini_get('max_input_vars') - 100) / 24) . ' Nutzer pro Seite oder auf weniger beschränkt sein. Andernfalls müsste max_input_vars in der php.ini vergrößert werden um eine fehlerhafte Ausgabe zu vermeiden.',
	'DIGESTS_WEEKLY_DIGESTS_DAY'							=> 'Bitte den Wochentag auswählen, an welchem die E-Mail-Zusammenfassung versendet werden soll',
	'DIGESTS_WEEKLY_DIGESTS_DAY_EXPLAIN'					=> 'Der Wochentag basiert auf der UTC. Abhängig von der gewünschten Uhrzeit können Abonnenten in der westlichen Hemisphäre evtl. ihre wöchentlichen Zusammenfassungen schon einen Tag früher als erwartet zugesandt bekommen.',
	'DIGESTS_WEEKLY_ONLY'									=> 'Nur wöchentliche Zusammenfassungen',
	'DIGESTS_WITH_SELECTED'									=> 'Abonnement für ausgewählte Nutzer ändern', 

));

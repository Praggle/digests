<?php
/**
 *
 * @package phpBB Extension - Digests
 * @copyright (c) 2021 Mark D. Hamill (mark@phpbbservices.com)
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

$lang = array_merge($lang, array(
	'DIGESTS_WEEKDAY' 					=> 'Sonntag,Montag,Dienstag,Mittwoch,Donnerstag,Freitag,Samstag',
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
	'DIGESTS_COLLAPSE'										=> 'Einklappen',
	'DIGESTS_COMMA'											=> ', ',		// Used  in salutations and to separate items in lists
	'DIGESTS_CREATE_DIRECTORY_ERROR'						=> 'Das Verzeichnis %s konnte nicht angelegt werden. Ursache könnten fehlende Dateirechte sein. Sie sollten auf &rsquo;publicly writeable&rsquo; sein (777 auf Unix-basierten Systemen).',
	'DIGESTS_CURRENT_VERSION_INFO'							=> 'Aktuelle Version: <strong>%s</strong>',
	'DIGESTS_CUSTOM_STYLESHEET_PATH'						=> 'Pfad zum Custom-Stylesheet',
	'DIGESTS_CUSTOM_STYLESHEET_PATH_EXPLAIN'				=> 'Dieser Pfadangabe ist nur von Bedeutung, wenn weiter oben auch die Verwendung des Custom-Sylesheet aktiviert ist. Das Stylesheet wird dann für alle HTML-Zusammenfassungen verwendet. Es muss der relative Pfad zum phpBB-styles-Verzeichnis angegeben werden. Es ist sinnvoll, dafür ein eigenes Unterverzeichnis innerhalb des Themes anzulegen. Anmerkung: Es fällt in deinen eigenen Zuständigkeitsbereich, selbst ein solches Stylesheet zu entwickeln und es unter dem hier angegebenen Pfad und Namen auf den Server zu hinterlegen. Beispiel: prosilver/theme/digest_stylesheet.css. Informationen zum Erstellen von Stylesheets findest du <a href="http://www.w3schools.com/css/">hier</a>.',
	'DIGESTS_DEBUG'											=> 'Digests-Debugging aktivieren',
	'DIGESTS_DEBUG_EXPLAIN'									=> 'Für technische Fehlersuche. Einige wichtige Schlüssel-Informationen zur Fehlereingrenzung werden ins Admin-Log geschrieben, z.B. Datenbankabfragen zur Erzeugung von Zusammenfassungen. Zur Interpretation solcher Einträge sind fortgeschrittene Programm-Kenntnisse erforderlich.',
	'DIGESTS_DEFAULT'										=> 'Abonnement mit Standard-Einstellungen anlegen',
	'DIGESTS_DAILY_ONLY'									=> 'Nur tägliche Zusammenfassung',
	'DIGESTS_ENABLE_AUTO_SUBSCRIPTIONS'						=> 'Automatisches Abonnieren aktivieren',
	'DIGESTS_ENABLE_AUTO_SUBSCRIPTIONS_EXPLAIN'				=> 'Um bei neuen Forumsnutzern standardmäßig nach der Registrierung ein aktiviertes Abonnement zu bewirken, muss hier &rsquo;Ja&rsquo; ausgewählt sein. Es werden dabei die Standard-Vorgaben der Administration verwendet (Zu finden unter &rsquo;Standard-Nutzerkonfiguration&rsquo;). Das Aktivieren dieser Option bewirkt <em>kein</em> Abonnement bei Nutzern, deren Abonnement beendet worden ist, die inaktiv sind oder die bei der Registrierung die E-Mail-Zusammenfassung deaktiviert haben. Einzelne Nutzer lassen sich aber noch individuell mithilfe der Abonnementverwaltung hinzufügen oder pauschal mithilfe des Massen-Abonnements.',
	'DIGESTS_ENABLE_CUSTOM_STYLESHEET'						=> 'Custom-Stylesheet aktivieren',
	'DIGESTS_ENABLE_CUSTOM_STYLESHEET_EXPLAIN'				=> 'Wenn kein Custom-Stylesheet eingerichtet ist, wird bei der Erzeugung aller HTML-formatierten Zusammenfassungen jeweils das Standard-Stylesheet verwendet, welches zum Style gehört, der im jeweiligen Nutzer-Profil ausgewählt wurde.',
	'DIGESTS_ENABLE_LOG'									=> 'Alle Aktivitäten der Digest-Extension mit im Admin-Log erfassen',
	'DIGESTS_ENABLE_LOG_EXPLAIN'							=> 'Wenn diese Option aktiviert wurde, werden alle Aktivitäten der Extension ins Administrations-Protokoll geschrieben (zu finden im Wartungstab). Das kann bei der Fehlersuche sehr hilfreich sein, weil es genau anzeigt, welche Schritte der Digest-Mailer für welche Abonnenten durchgeführt hat und zu welchem Zeitpunkt das war. Daraus resultiert allerdings ziemlich schnell ein extrem langes Admin-Log, denn der Digest-Mailer erzeugt mindestens zwei Einträge in jeder Stunde. Hinweis: Fehlermeldungen, Ausnahmezustände und Warnungen werden unabhängig von dieser Einstellung immer ins Protokoll geschrieben.',
	'DIGESTS_ENABLE_SUBSCRIBE_UNSUBSCRIBE'					=> 'Massenabonnement ermöglichen',
	'DIGESTS_ENABLE_SUBSCRIBE_UNSUBSCRIBE_EXPLAIN'			=> 'Wenn hier &rsquo;Ja&rsquo; ausgewählt wurde, wird beim Anklicken von &rsquo;Absenden&rsquo; die ausgewählte Aktion für alle Nutzer unumkehrbar durchgeführt. Bitte nur mit äußerster Vorsicht einsetzen!',
	'DIGESTS_EXCLUDE_FORUMS'								=> 'Diese Themenbereiche immer ausschließen',
	'DIGESTS_EXCLUDE_FORUMS_EXPLAIN'						=> 'Hier können die IDs der Themenbereiche ausgewählt werden, die von allen Zusammenfassungen generell ausgeschlossen werden sollen. Mehrere Forum-IDs können, durch Kommas getrennt, zusammen angegeben werden. 0 bedeutet, dass gar keine Themenbereich ausgeschlossen werden. Um die Themenbereichs-ID herauszufinden, muss man nach dem &rsquo;F&rsquo;-Parameter in den URL-Feldern suchen. Beispiel: http://www.example.com/phpBB3/viewforum.php?f=1. Bitte nicht die IDs von Kategorien verwenden! <i>Diese Option wird ignoriert, wenn nur die Lesezeichen-Themen vom Nutzer ausgewählt wurden.</i>',
	'DIGESTS_EXPAND'										=> 'Ausklappen',
	'DIGESTS_FREQUENCY_EXPLAIN'								=> 'Wöchentliche Zusammenfassungen werden an dem in der allgemeinen Konfiguration der Erweiterung festgelegten Wochentag versandt. Monatliche Zusammenfassungen werden jeweils am Ersten des Monats versandt. Der Wochentag wird jeweils auf Basis der koordinierten Weltzeit (UTC) ermittelt.',
	'DIGESTS_FORMAT_FOOTER' 								=> 'Digest-Format',
	'DIGESTS_FROM_EMAIL_ADDRESS'							=> 'Absendermailadresse',
	'DIGESTS_FROM_EMAIL_ADDRESS_EXPLAIN'					=> 'Wenn die E-Mail-Zusammenfassung beim Nutzer eintrifft, erscheint diese E-Mailadresse im Absender-Feld (From). Wird das Feld leer gelassen, so wird automatisch die Kontaktmailadresse des Boards verwendet. Diese Adresse sollte mit Bedacht gewählt werden, da Adressen von einer fremden Domain schon vom absendenden Mailserver oder dann vom empfangenden Server leicht als spamverdächtig eingestuft und herausgefiltert werden könnten.',
	'DIGESTS_FROM_EMAIL_NAME'								=> 'Absendername',
	'DIGESTS_FROM_EMAIL_NAME_EXPLAIN'						=> 'Hier kann der Name festgelegt werden, der beim Empfänger als Absender der E-Mail-Zusammenfassungen angezeigt werden soll. Wenn das Feld frei gelassen wird, identifiziert der Mailer sich als Mail-Robot.',
	'DIGESTS_HAS_UNSUBSCRIBED'								=> 'Abonnement eigenhändig beendet',
	'DIGESTS_HOUR_SENT'										=> 'Sendeuhrzeit (UTC%+d)',
	'DIGESTS_HOUR_SENT_GMT'									=> 'Standard-Sendeuhrzeit (UTC)',
	'DIGESTS_IGNORE'										=> 'Keine globale Änderung vornehmen',
	'DIGESTS_ILLOGICAL_DATE'								=> 'Die Zeitangabe ist unungültig. Bitte korrigieren und erneut absenden. Es wird dabei das Format YYYY-MM-DD HH:MM:SS benötigt.',
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
	'DIGESTS_MAIL_FREQUENCY' 								=> 'Häufigkeit der E-Mail-Zusammenstellung',
	'DIGESTS_MAILER_RESET' 									=> 'Der Digest Mailer wurde zurück gesetzt',
	'DIGESTS_MAILER_NOT_RUN'								=> 'Mailer wurde nicht gestartet, weil er nicht aktiviert war oder es keine Löschanforderung für das Digests-Verzeichnis gab.',
	'DIGESTS_MAILER_RAN_SUCCESSFULLY'						=> 'Mailer wurde erfolgreich gestartet.',
	'DIGESTS_MAILER_RAN_WITH_ERROR'							=> 'Bei der Ausführung des Mailers ist ein Fehler aufgetreten. Dabei können jedoch Zusammenfassungen durchaus erfolgreich erzeugt worden sein. Die Administrations- oder das Fehlerprotokoll kann dazu ggf. genauere Informationen enthalten.',
	'DIGESTS_MAILER_SPOOLED'								=> 'Die für diesen Tag und diese Stunde vorgesehenen Zusammenfassungen wurden im store/ext/phpbbservices/digests-Verzeichnis gespeichert.',
	'DIGESTS_MARK_UNMARK_ROW'								=> 'Zeile für Änderungen markieren oder Markierung entfernen',
	'DIGESTS_MARK_ALL'										=> 'Alle Zeilen für Änderungen markieren oder alle Markierungen entfernen',
	'DIGESTS_MAX_CRON_HOURS'								=> 'Maximale Ausführungsdauer pro Aufruf für den Mailer',
	'DIGESTS_MAX_CRON_HOURS_EXPLAIN'						=> 'Bei einem Dedicated Server oder bei Virtual Hosting Umgebungen kann diese Einstellung normalerweise auf 0 (Null) bleiben, um alle Versandzeitpunkte abzudecken. Läuft das Forum dagegen in einer <strong>Shared Hosting</strong> Umgebung, dann kann die Ausführung des Mailers Fehler verursachen, insbesondere, wenn es dort viele Abonnenten und viele abzudeckende Versandzeitpunkte gibt. Der einfachste Weg zur Vermeidung solcher Probleme ist die <em>Einrichtung eines <a href="https://wiki.phpbb.com/PhpBB3.1/RFC/Modular_cron#Use_system_cron">System-Cronjobs</a></em>. Nur ein System-Cronjob kann den fristgerechten Versand der E-Mail-Zusammenfassung gewährleisten. Andernfalls läuft man Gefahr, dass solche Fehler durch das Erreichen von Obergrenzen in den aufgeteilten Ressourcen eines Shared Hosts verursacht werden. Wenn das vorkommt, und ein System-Cronjob nicht verwendet werden kann, sollte dieser Wert auf 1 gesetzt werden. Eine weitere Erhöhung dieses Wertes kann eventuell darüberhinaus vorgenommen werden, wenn man die Erfahrung gemacht hat, dass mehrere Stunden bis zum Abschluss der Aufgabe nötig sind. <em>Hinweis:</em> Der Versand der Zusammenfassungen kann sich durch eine solche Konfiguration für manche Abonnenten verzögern, weil das Forum immer Nutzerverkehr benötigt, um den Mailer laufen zu lassen.',
	'DIGESTS_MAX_ITEMS'										=> 'Maximale Beitragszahl pro Zusammenfassung',
	'DIGESTS_MAX_ITEMS_EXPLAIN'								=> 'Aus Performance-Gründen kann es sinnvoll sein, hier eine absolute Obergrenze für alle Zusammenfassungen festzulegen. Eine Null bedeutet, dass es kein Beitragslimit gibt und die Zusammenfassungen unendlich groß werden können. Es sind nur ganzzahlige Werte erlaubt. Dabei ist zu bedenken, dass die Größe der Zusammenstellungen auch durch die gewählte Zusammenfassungsart (täglich, wöchentlich, monatlich) und durch andere Voreinstellungen weiter eingeschränkt werden kann.',
	'DIGESTS_MAIL_FREQUENCY' 								=> 'Häufigkeit der E-Mail-Zusammenstellung',
	'DIGESTS_MIGRATE_UNSUPPORTED_VERSION'					=> 'Upgrades des Digests-Mods (for phpBB 3.0) werden nur ab Version 2.2.6 und höher unterstützt. Die hier vorgefundene Version lautet jedoch %s. Die Extension kann deshalb leider nicht hierher migriert werden. Ein Update auf Basis des alten Datenbestandes ist nicht möglich. Unterstützung kann man bei Bedarf jedoch im entsprechenden Diskussionsforum der Extension auf phpbb.com erhalten.',
	'DIGESTS_MIN_POPULARITY_SIZE'							=> 'Mindestbeitragszahl für beliebte Themen',
	'DIGESTS_MIN_POPULARITY_SIZE_EXPLAIN'					=> 'Hier wird die Mindestbeitragszahl pro Tag festgelegt, die ein Thema als beliebt einstuft. Abonnenten können keine niedrigeren Werte festlegen. Dieser Wert bezieht sich auf das jeweils vom Nutzer festgelegte Zusammenfassungsintervall: Tag, Woche oder Monat.',
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
	'DIGESTS_RUN_TEST_CLEAR_SPOOL_EXPLAIN'					=> '&rsquo;Ja&rsquo; bedeutet, dass alle Dateien im store/ext/phpbbservices/digests-Ordner gelöscht werden. Das geht auch ohne Mailer-Aufruf.',
	'DIGESTS_RUN_TEST_DATE_HOUR'									=> 'Datum und Uhrzeit der Ausführung',
	'DIGESTS_RUN_TEST_DATE_HOUR_EXPLAIN'							=> 'Mit Hilfe des Date/Hour-Pickers kann die gewünschte Zeit ausgewählt werden. Die Zeiten beziehen sich dabei jeweils auf die Zeitzoneneinstellung des Boards.',
	'DIGESTS_RUN_TEST_EMAIL_ADDRESS'						=> 'Testmailadresse',
	'DIGESTS_RUN_TEST_EMAIL_ADDRESS_EXPLAIN'				=> 'Wenn hier eine E-Mailadresse angegeben ist, werden alle Zusammenfassungen des gewünschten Zeitpunktes an diese Adresse gesendet. Ist sie leer, wird bei Bedarf die Kontakt-Emailadresse des Boards als Empfängeradresse verwendet. <em>Beachte</em>: Wenn die E-Mail-Zusammenfassungen als Dateien abgespeichert werden, wird dieses Feld nicht verwendet.',
	'DIGESTS_RUN_TEST_SEND_TO_ADMIN'						=> 'Alle E-Mail-Zusammenfassungen an die unten festgelegte Adresse senden',
	'DIGESTS_RUN_TEST_SEND_TO_ADMIN_EXPLAIN'				=> 'Zu Testzwecken, sollten die Zusammenfassungen nicht an die Nutzeradressen gesendet werden, sondern an eine Testmailadresse. <em>Beachte</em>: Wenn die E-Mail-Zusammenfassungen als Dateien abgespeichert werden, wird dieses Feld nicht verwendet. Wenn hier &rsquo;Ja&rsquo; markiert ist, aber weiter unten keine entsprechende E-Mailadresse angegeben ist, gehen alle Test-Zusammenfassungen an die Kontaktadresse des Boards. <em>Achtung:</em> Manche E-Mail-Server werden solche großen Mengen an ähnlichen E-Mails vom selben Absender und in kurzem Zeitintervall als Spam-Versuch oder unangemessene Benutzung zurückweisen. Diese Funktion sollte sehr überlegt ausgewählt werden. Wird hier nämlich &rsquo;Nein&rsquo; selektiert, so werden evtl. alte Zusammenfassungen erneut an die Adressen der Nutzer gesendet, was zur Verwirrung führen kann.',
	'DIGESTS_RUN_TEST_SPOOL'								=> 'Zusammenfassungen als Dateien speichern, anstatt sie als E-Mails zu senden',
	'DIGESTS_RUN_TEST_SPOOL_EXPLAIN'						=> 'Verhindert das Versenden der Zusammenfassungen per E-Mail. Stattdessen wird jede Zusammenfassung in eine Datei im store/ext/phpbbservices/digests-Ordner geschrieben. Die Dateinamen haben dabei folgendes Format: username-yyyy-mm-dd-hh.html oder username-yyyy-mm-dd-hh.txt. (Dateien mit der Endung .txt sind Nur-Text-Zusammenfassungen.) Username ist der jeweilige Nutzername. yyyy ist das Jahr, mm der Monat, dd der Kalendertag, hh die Stunde in UTC. Um die Dateien ansehen zu können, muss man sie zunächst in ein lokales Verzeichnis speichern und dort mit einem Browser im lokalen Modus öffnen: CTRL+O oder CMD+O (Mac). <em>Hinweis</em>: Verwende dabei den Buchstaben O, nicht die Zahl 0.',
	'DIGESTS_SALUTATION_FIELDS'								=> 'Anredefelder auswählen',
	'DIGESTS_SALUTATION_FIELDS_EXPLAIN'						=> 'Falls vorhanden, können hier die Feldnamen von benutzerdefinierten Profilfeldern eingeben werden, durch die der Benutzername in der E-Mail-Anrede ersetzt werden soll. Wenn das Feld leer bleibt, wird der Benutzername verwendet. Es muss dabei jeweils die entsprechende Feld-Kennung eingetragen werden, welche auf der Seite mit den benutzerdefinierten Profilfeldern zu finden ist. Mehrere Feldnamen werden durch Kommas getrennt. <em>Hinweis:</em> Es sind nur Felder vom Typ "Einzeiliges Textfeld" erlaubt. Wenn keines der benutzerdefinierten Profilfelder existiert oder die Felder eines Abonnenten keinen Wert enthalten, wird stattdessen der Benutzername verwendet. Beispiel: vorname,nachname (wenn benutzerdefinierte Profilfelder mit solchen Kennungen angelegt worden sind). Zwischen jedem benutzerdefinierten Profilfeld wird in der E-Mail-Anrede automatisch ein Leerzeichen eingefügt.',
	'DIGESTS_SEARCH_FOR_MEMBER'								=> 'Teilnehmer suchen',
	'DIGESTS_SEARCH_FOR_MEMBER_EXPLAIN'						=> 'Man kann hier den vollständigen Nutzernamen oder auch nur einen Teil davon eingeben oder auch nur seine E-Mail-Adresse. Anschließend mit Return oder Enter quittieren. Um alle Nutzer zu sehen, das Feld einfach leer lassen. Die Suche ist nicht case sensitive. <em>Hinweis</em>: Es muss ein @-Zeichen in diesem Feld enthalten sein, um eine E-Mail-Suche durchzuführen.',
	'DIGESTS_SELECT_FORUMS_ADMIN_EXPLAIN'					=> 'In der Auswahlliste tauchen nur die Themenbereiche auf, für die der Nutzer auch eine Leseberechtigung hat. Wenn Bedarf besteht, dem Nutzer auch Beiträge aus hier nicht mit aufgeführten Themenbereichen zukommen zu lassen, muss dafür eine entsprechende Änderung in den Benutzer- oder Gruppenrechten vorgenommen werden.',
	'DIGESTS_SHOW'											=> 'Anzeigen',
	'DIGESTS_SHOW_EMAIL'									=> 'E-Mailadresse im Log anzeigen',
	'DIGESTS_SHOW_EMAIL_EXPLAIN'							=> 'Wenn diese Option aktiviert ist, wird zusätzlich zum Nutzernamen auch die E-Mailadresse des Nutzers im Administrationsprotokoll mit aufgeführt. Gerade im Zusammenhang mit Mailer-Problemen kann diese Funktion bei der Fehlersuche hilfreich sein.',
	'DIGESTS_SHOW_FORUM_PATH'								=> 'Hierarchische Pfade in der Zusammenfassung anzeigen',
	'DIGESTS_SHOW_FORUM_PATH_EXPLAIN'						=> 'Bei Aktivierung dieser Option wird der komplette hierarchische Pfad aus Kategorie, Forum und Unterforum angezeigt, z.B. &ldquo;Kategorie 1 &#8249; Forum 1 &#8249; Kategorie A &#8249; Forum B&rdquo;. Im anderen Fall wird nur der Forenname angezeigt: &ldquo;Forum B&rdquo;',
	'DIGESTS_SORT_ORDER'									=> 'Sortierreihenfolge',
	'DIGESTS_STOPPED_SUBSCRIBING'							=> 'Abonnement gestoppt',
	'DIGESTS_STRIP_TAGS'									=> 'Auszuschließende HTML-Tags',
	'DIGESTS_STRIP_TAGS_EXPLAIN'							=> 'Mail-Server können die Weiterleitung unterbinden, den Absender über Blacklisten blockieren oder die Zusammenfassungen in den Spamverdachtsordner verschieben. Schreibe die exakten Bezeichnungen der auszuschließenden HTML-Tags (ohne &lt;- oder &gt;-Zeichen) durch Kommas getrennt hintereinander. Um z.B. video and iframe-Tags zu entfernen, schreibt man &ldquo;video,iframe&rdquo; in dieses Feld. Häufig verwendete Tags, wie h1, p und div sollten hier vermieden werden, da sie für ein fehlerfreies Rendern der Zusammenfassungen benötigt werden.',
	'DIGESTS_SUBSCRIBE_EDITED'								=> 'Deine Konfiguration des E-Mail-Zusammensfassungsversandes wurde geändert.',
	'DIGESTS_SUBSCRIBE_SUBJECT'								=> 'Du erhältst ab jetzt regelmäßig Zusammenfassungen der Forumsbeiträge per E-Mail an die in deinem Profil hinterlegte Adresse.',
	'DIGESTS_SUBSCRIBE_ALL'									=> 'Überall Abonnements anlegen (sonst löschen)',
	'DIGESTS_SUBSCRIBE_ALL_EXPLAIN'							=> 'Achtung: &rsquo;Nein&rsquo; bedeutet, dass alle Abonnements gelöscht werden. Bitte mit Bedacht auswählen!',
	'DIGESTS_SUBSCRIBE_LITERAL'								=> 'Abonnieren',
	'DIGESTS_SUBSCRIBED'									=> 'Abonniert',
	'DIGESTS_SUBSCRIBERS_DAILY'                           	=> 'Tägliche Abonnenten',
	'DIGESTS_SUBSCRIBERS_WEEKLY'                           	=> 'Wöchentliche Abonnenten',
	'DIGESTS_SUBSCRIBERS_MONTHLY'                           => 'Monatliche Abonnenten',
	'DIGESTS_UNLINK_FOREIGN_URLS'							=> 'Entferne externe URLs aus den Zusammenfassungen',
	'DIGESTS_UNLINK_FOREIGN_URLS_EXPLAIN'					=> 'Entfernt alle Links zu externen Domains aus den Zusammenfassungen. Manche E-Mail-Systeme stufen E-Mails mit Links zu anderen Domains als spamverdächtig ein. Dadurch können die E-Mail-Zusammenfassungen im Spamverdachtsordner landen oder vom Postausgangsserver gar nicht erst gesendet werden.',
	'DIGESTS_UNSUBSCRIBE'									=> 'Abonnement beenden',
	'DIGESTS_UNSUBSCRIBE_SUBJECT'							=> 'Du erhältst ab jetzt keine E-Mail-Zusammenstellungen mehr',
	'DIGESTS_UNSUBSCRIBED'									=> 'Noch nie abonniert',
	'DIGESTS_USER_DIGESTS_CHECK_ALL_FORUMS'					=> 'Sollen alle Themenbereiche standardmäßig ausgewählt werden?',
	'DIGESTS_USER_DIGESTS_MAX_DISPLAY_WORDS'				=> 'Maximal angezeigte Wortanzahl pro Beitrag',
	'DIGESTS_USER_DIGESTS_MAX_DISPLAY_WORDS_EXPLAIN'		=> '-1 bedeutet dass immer der komplette Beitrag wiedergegeben wird. Null (0) bedeutet dagegen, dass gar kein Beitragsinhalt wiedergegeben wird.',
	'DIGESTS_USER_DIGESTS_PM_MARK_READ'						=> 'Private Nachrichten als gelesen markieren, wenn sie in der Zusammenfassung erscheinen',
	'DIGESTS_USERS_PER_PAGE'								=> 'Nutzer pro Seite',
	'DIGESTS_USERS_PER_PAGE_EXPLAIN'						=> 'Hier wird eingestellt wieviele Nutzer pro Seite in der Abonnement-Verwaltung angezeigt werden sollen. Es ist zu empfehlen, diese Einstellung bei 20 zu belassen. Wenn der Wert zu groß gewählt wird, kann das unter Umständen max_input_vars-Fehler in PHP verursachen.',
	'DIGESTS_WEEKLY_DIGESTS_DAY'							=> 'Bitte den Wochentag auswählen, an welchem die E-Mail-Zusammenfassung versendet werden soll',
	'DIGESTS_WEEKLY_DIGESTS_DAY_EXPLAIN'					=> 'Der Wochentag basiert auf der UTC. Abhängig von der gewünschten Uhrzeit können Abonnenten in der westlichen Hemisphäre evtl. ihre wöchentlichen Zusammenfassungen schon einen Tag früher als erwartet zugesandt bekommen.',
	'DIGESTS_WEEKLY_ONLY'									=> 'Nur wöchentliche Zusammenfassungen',
	'DIGESTS_WITH_SELECTED'									=> 'Abonnement für ausgewählte Nutzer ändern',

));

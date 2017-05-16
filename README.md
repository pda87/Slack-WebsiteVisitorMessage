# Slack-WebsiteVisitorMessage

A JavaScript Ajax request embedded in a HTML file which calls a PHP script when the web page is served. This sends the message<BR>

<code>You have a new website visitor</code><BR>

to a Slack messenger channel when ran. Uses the Slack API and requires a few values to be input into the PHP script.

There is another Post method in the PHP script, which uses <a href="https://api.ipify.org/?format=json">IPify</a> to get the client IP address and if there are no Adblockers enabled, uses this to get the GPS location from <a href="http://ip-api.com/json">IP API</a>. This visitor information is then sent as a Slack message.

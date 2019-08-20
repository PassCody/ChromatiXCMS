// https://github.com/LeoWinterDE/TS3ServerStatusViewer

function ts3ssvconnect(id, channel)
{
	var id = "ts3ssv-" + id;
	var hostport = document.getElementById(id + "-hostport").value;
	var nickname = document.getElementById(id + "-nickname");
	var password = document.getElementById(id + "-password");
	var command = "ts3server://" + hostport.replace(":", "?port=");
	var dateExpire = new Date;

	dateExpire.setMonth(dateExpire.getMonth()+1);

	(window.open(command)).close();
}
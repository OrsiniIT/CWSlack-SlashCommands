<?php
/*
	CWSlack-SlashCommands
    Copyright (C) 2017  jundis

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


// This is a development branch, please use with caution as things will frequently be changing.

// This file is the new central router for all commands, redirecting them to the proper files as necessary.

ini_set('display_errors', 1); //Display errors in case something occurs
header('Content-Type: application/json'); //Set the header to return JSON, required by Slack
require_once 'config.php';
require_once 'functions.php';

if(empty($_REQUEST['token']) || ($_REQUEST['token'] != $slacktoken)) die("Slack token invalid."); //If Slack token is not correct, kill the connection. This allows only Slack to access the page for security purposes.
if(empty($_REQUEST['command'])) die("No command provided");

$slackcommand = strtolower(substr($_REQUEST['command'],1));

if($slackcommand == "t" || $slackcommand == "tickets" || $slackcommand == "ticket") {
    include 'cwslack-tickets.php';
}
elseif($slackcommand == "act" || $slackcommand == "activities")
{
    include 'cwslack-activities.php';
}
elseif($slackcommand == "configs" || $slackcommand == "config" || $slackcommand == "configuration" || $slackcommand == "configurations")
{
    include 'cwslack-configs.php';
}
elseif($slackcommand == "contact" || $slackcommand == "contacts")
{
    include 'cwslack-contacts.php';
}
elseif($slackcommand == "dbm" || $slackcommand == "dbmanage" || $slackcommand == "db" || $slackcommand == "database")
{
    include 'cwslack-dbmanage.php';
}
elseif($slackcommand == "follow" || $slackcommand == "unfollow")
{
    include 'cwslack-follow.php';
}
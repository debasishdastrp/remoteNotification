#!/bin/bash
while [ 1 ];
do
var="$(termux-notification-list)"
curl -H "Content-Type: application/json" -X POST -d "$(echo $var)" "http://192.168.10.2/notification/api/take.php"
sleep 1
done

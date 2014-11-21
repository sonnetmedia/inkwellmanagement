//not using this
var clientData = 

[
{exp:query sql="
SELECT field_id_3, title, field_id_131, field_id_132, url_title
FROM exp_channel_titles LEFT JOIN exp_channel_data 
ON exp_channel_titles.entry_id = exp_channel_data.entry_id
WHERE exp_channel_titles.channel_id = '2'
AND status = 'open'
AND field_id_3 LIKE '{segment_3}%'
ORDER BY field_id_3 
limit 100000"
backspace="1"}
{
value:"/clients/{url_title}", "{field_id_131}"
label:"{title}", category: "{channel_title}" },{/exp:query}


];
	

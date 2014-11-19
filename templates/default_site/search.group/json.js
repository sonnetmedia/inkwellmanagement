var booksData = 

[
{exp:query sql="SELECT title, comment_url, url_title, channel_title FROM exp_channel_titles LEFT JOIN exp_channels USING (channel_id) WHERE (channel_id = '1' OR channel_id ='2' OR channel_id ='4') AND status = 'open' ORDER BY channel_title, title limit 100000" backspace="1"}
{
value:"{comment_url}{url_title}",
label:"{title}", category: "{channel_title}" },{/exp:query}


];
	

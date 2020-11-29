<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-09-10 05:49:17 --> 404 Page Not Found: Wp-loginphp/index
ERROR - 2020-09-10 17:35:13 --> 404 Page Not Found: Robotstxt/index
ERROR - 2020-09-10 17:35:16 --> 404 Page Not Found: Bowernd/img
ERROR - 2020-09-10 17:35:16 --> 404 Page Not Found: Faviconpng/index
ERROR - 2020-09-10 17:35:24 --> 404 Page Not Found: Bowernd/img
ERROR - 2020-09-10 17:35:24 --> 404 Page Not Found: Faviconpng/index
ERROR - 2020-09-10 17:35:34 --> 404 Page Not Found: Bowernd/img
ERROR - 2020-09-10 17:36:08 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_sipp.trans_survey_clean.p7' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT a.id_paslon, a.image_paslon, a.nama_kepala,a.kepala_alias,a.nama_wakil,a.wakil_alias,a.warna,b.p7_id,IFNULL(b.total,0) as total,IFNULL(b.jumlah,0) as jumlah 
			FROM m_paslon a 
			LEFT JOIN (SELECT count(*) as total, round(( count(1)/(SELECT count(1) from trans_survey_clean where 1=1 and id_provinsi='35') * 100 ),2) AS jumlah, p7_id, p7 from trans_survey_clean where 1=1 and id_provinsi='35' group by p7_id) b on a.id_paslon=b.p7_id
			where a.id_area='35' and a.is_deleted = '0'
			order by jumlah desc
ERROR - 2020-09-10 17:36:19 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_sipp.trans_survey_clean.p7' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT a.id_paslon, a.image_paslon, a.nama_kepala,a.kepala_alias,a.nama_wakil,a.wakil_alias,a.warna,b.p7_id,IFNULL(b.total,0) as total,IFNULL(b.jumlah,0) as jumlah 
			FROM m_paslon a 
			LEFT JOIN (SELECT count(*) as total, round(( count(1)/(SELECT count(1) from trans_survey_clean where 1=1 and id_provinsi='35') * 100 ),2) AS jumlah, p7_id, p7 from trans_survey_clean where 1=1 and id_provinsi='35' group by p7_id) b on a.id_paslon=b.p7_id
			where a.id_area='35' and a.is_deleted = '0'
			order by jumlah desc
ERROR - 2020-09-10 17:36:20 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_sipp.trans_survey_clean.p7' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT a.id_paslon, a.image_paslon, a.nama_kepala,a.kepala_alias,a.nama_wakil,a.wakil_alias,a.warna,b.p7_id,IFNULL(b.total,0) as total,IFNULL(b.jumlah,0) as jumlah 
			FROM m_paslon a 
			LEFT JOIN (SELECT count(*) as total, round(( count(1)/(SELECT count(1) from trans_survey_clean where 1=1 and id_provinsi='35') * 100 ),2) AS jumlah, p7_id, p7 from trans_survey_clean where 1=1 and id_provinsi='35' group by p7_id) b on a.id_paslon=b.p7_id
			where a.id_area='35' and a.is_deleted = '0'
			order by jumlah desc
ERROR - 2020-09-10 17:36:28 --> Query error: Expression #4 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'db_sipp.trans_survey_clean.p7' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT a.id_paslon, a.image_paslon, a.nama_kepala,a.kepala_alias,a.nama_wakil,a.wakil_alias,a.warna,b.p7_id,IFNULL(b.total,0) as total,IFNULL(b.jumlah,0) as jumlah 
			FROM m_paslon a 
			LEFT JOIN (SELECT count(*) as total, round(( count(1)/(SELECT count(1) from trans_survey_clean where 1=1 and id_provinsi='35') * 100 ),2) AS jumlah, p7_id, p7 from trans_survey_clean where 1=1 and id_provinsi='35' group by p7_id) b on a.id_paslon=b.p7_id
			where a.id_area='35' and a.is_deleted = '0'
			order by jumlah desc
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Undefined variable: informasi /home/digipol/public_html/main/application/views/new/tab_profile.php 60
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Trying to get property of non-object /home/digipol/public_html/main/application/views/new/tab_profile.php 60
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Undefined variable: informasi /home/digipol/public_html/main/application/views/new/tab_profile.php 65
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Trying to get property of non-object /home/digipol/public_html/main/application/views/new/tab_profile.php 65
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Undefined variable: informasi /home/digipol/public_html/main/application/views/new/tab_profile.php 70
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Trying to get property of non-object /home/digipol/public_html/main/application/views/new/tab_profile.php 70
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Undefined variable: informasi /home/digipol/public_html/main/application/views/new/tab_profile.php 75
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Trying to get property of non-object /home/digipol/public_html/main/application/views/new/tab_profile.php 75
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Undefined variable: informasi /home/digipol/public_html/main/application/views/new/tab_profile.php 80
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Trying to get property of non-object /home/digipol/public_html/main/application/views/new/tab_profile.php 80
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Undefined variable: informasi /home/digipol/public_html/main/application/views/new/tab_profile.php 85
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Trying to get property of non-object /home/digipol/public_html/main/application/views/new/tab_profile.php 85
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Undefined variable: informasi /home/digipol/public_html/main/application/views/new/tab_profile.php 90
ERROR - 2020-09-10 17:37:28 --> Severity: Notice --> Trying to get property of non-object /home/digipol/public_html/main/application/views/new/tab_profile.php 90
ERROR - 2020-09-10 17:38:56 --> 404 Page Not Found: Bowernd/img
ERROR - 2020-09-10 17:39:18 --> Query error: Column 'idKel' in group statement is ambiguous - Invalid query: SELECT b.id, b.logo, name,sum(dpt) as jml from sum_dpt_jatim a inner join m_villages b on a.idKel=b.id where 1=1 AND tps!='999' and idKec = 3578010 group by idKel
ERROR - 2020-09-10 17:39:27 --> Query error: Column 'idKel' in group statement is ambiguous - Invalid query: SELECT b.id, b.logo, name,sum(dpt) as jml from sum_dpt_jatim a inner join m_villages b on a.idKel=b.id where 1=1 AND tps!='999' and idKec = 3578010 group by idKel
ERROR - 2020-09-10 23:27:37 --> 404 Page Not Found: Robotstxt/index
ERROR - 2020-09-10 23:27:37 --> 404 Page Not Found: Humanstxt/index
ERROR - 2020-09-10 23:27:38 --> 404 Page Not Found: Adstxt/index

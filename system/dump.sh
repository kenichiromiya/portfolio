#!/bin/sh
#mysql -umiyaa -ps5312638k16 -hmysql225.db.sakura.ne.jp < dump.sql
mysqldump --add-drop-table=FALSE --compact --no-data -umiyaa -ps5312638k16 -hmysql225.db.sakura.ne.jp miyaa portfolio_index portfolio_sessions portfolio_accounts > dump.sql

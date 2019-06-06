echo "CREATE DATABASE IF NOT EXISTS \`${MYSQL_DATABASE}\` DEFAULT CHARACTER SET = \`utf8\` ;" | "${mysql[@]}"
echo "GRANT ALL ON \`testing\`.* TO '${MYSQL_USER}'@'%' ;" | "${mysql[@]}"
echo 'FLUSH PRIVILEGES ;' | "${mysql[@]}"

echo "use \`${MYSQL_DATABASE}\`"
echo "source dump.sql"
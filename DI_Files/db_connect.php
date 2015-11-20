<?php
class db_connect {
    public function db($query) {
        $connect = odbc_connect("SIT", "palagi01", "s1mple01");
		$result = odbc_exec($connect, $query);
		return $result;
		#odbc_close($connect);
    }
}
?>
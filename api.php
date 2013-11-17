<?php
date_default_timezone_set('America/New_York');

// connect
$m = new MongoClient();

// select a database
$db = $m->simplecalc;

// select a collection (analogous to a relational database's table)
$accounts = $db->accounts;

$output = array("error" => TRUE);
if (isset($_GET['action']) && $_GET['action'] !== '') {
	switch (strtolower($_GET['action'])) {
	case 'addaccount':
		if (isset($_GET['account_name']) && $_GET['account_name'] !== '') {
			$account_name = $_GET['account_name'];
			$balance = (isset($_GET['balance']) && $_GET['balance'] !== '') ? $_GET['balance'] : 0;
			$addResult = addAccount($account_name, $balance);
			$balance = getBalance($account_name);
			if ($addResult && $balance) {
				$output = array("balance" => $balance);
			}
		}
		break;
	case 'getbalance':
		if (isset($_GET['account_name']) && $_GET['account_name'] !== '') {
			$account_name = $_GET['account_name'];
			$balance = getBalance($account_name);
			if ($balance) {
				$output = array("balance" => $balance);
			}
		}
		break;
	case 'getaccounts':
		$accts = getAccounts();
		if ($accts) {
			$output = array();
			foreach ($accts as $acct) {
				$output[$acct['account_name']]['transactions'] = $acct['transactions'];
				$output[$acct['account_name']]['balance'] = $acct['balance'];
			}
		}
		break;
	case 'addtransaction':
	default:
		if (isset($_GET['account_name']) && $_GET['account_name'] !== '' && isset($_GET['amount']) && $_GET['amount'] !== '') {
			$account_name = $_GET['account_name'];
			$amount = $_GET['amount'];
			$insertResult = insertTransaction($account_name, $amount);
			$balance = getBalance($account_name);
			if ($insertResult && $balance) {
				$output = array("balance" => $balance);
			}
		}
		break;
	}
}
echo json_encode($output);
exit;

function addAccount ($account_name, $balance = 0) {
	global $accounts;
	$document = array(
		"account_name" => $account_name,
		"transactions" => array(),
		"balance" => $balance
	);
	try {
		$accounts->insert($document);
		$accounts->ensureIndex(array("account_name" => 1), array("unique" => 1));
		return TRUE;
	} catch (Exception $e) {
		return FALSE;
	}
}

function insertTransaction ($account_name, $amount) {
	global $accounts;
	try {
		$document = $accounts->findOne(array(
			"account_name" => $account_name
		));
		$accounts->update(array(
			"account_name" => $account_name
		),
		array(
			'$push' => array(
				"transactions" => array(
					"date" => date('U'),
					"amount" => $amount
				)
			),
			'$set' => array(
				"balance" => $document['balance'] + $amount
			)
		));
		return TRUE;
	} catch (Exception $e) {
		return FALSE;
	}
}

function getBalance ($account_name) {
	global $accounts;
	try {
		$document = $accounts->findOne(array(
			"account_name" => $account_name
		));
		return $document['balance'];
	} catch (Exception $e) {
		return FALSE;
	}
}

function getAccounts () {
	global $accounts;
	try {
		$document = $accounts->find();
		return $document;
	} catch (Exception $e) {
		return FALSE;
	}
}
?>

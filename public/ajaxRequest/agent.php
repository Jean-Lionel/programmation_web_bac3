<?php

use App\Model\AgentTable;
require '../../vendor/autoload.php';

$id = intval($_GET['id_agent']);

$agentTable = new AgentTable();

$agentTable->delete($id);

echo "success";
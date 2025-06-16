<?php
    class methods {

        public function getTabelas($conn) {
            $tab = (isset($_GET['tabela'])) ? $_GET['tabela'] : '';
            $sql = "SHOW TABLES";
            $stmt = $conn->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_NUM);
            echo '<option value="null" disabled'.($tab == null ? 'selected' : '').'>Selecione uma tabela</option>';
            foreach ($result as $row) {
                echo '<option value="'.$row[0].'"'.($tab == $row[0] ? 'selected' : '').'>'.$row[0].'</option>';
            }
        }
        public function getDados($conn) {
            $tab = (isset($_GET['tabela'])) ? $_GET['tabela'] : null;
            if ($tab) {
                $sql = "SELECT * FROM $tab";
                $stmt = $conn->query($sql);
                if($stmt->execute()) {
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    echo '<table class="data-table"><tr id="item">';
                    foreach (array_keys($result[0]) as $field) {
                        echo '<th>'.htmlspecialchars($field).'</th>';
                    }
                    echo '</tr>';
                    foreach ($result as $row) {
                        echo '<tr>';
                        foreach($row as $field => $value) {
                            if (strtolower($field) === 'salario' || strtolower($field) === 'salário') {
                                // Formata como dólar americano
                                echo '<td>$' . number_format($value, 2, '.', ',') . '</td>';
                            } else {
                                echo '<td>'.htmlspecialchars($value).'</td>';
                            }
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo '<h3>Dados não encontrados</h3>';
                }
            }
        }
    }
?>
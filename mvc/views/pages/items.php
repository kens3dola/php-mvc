<!-- <table width="60%">
        <thead>
                <tr>
                        <th>1</th>
                        <th>2</th>
                </tr>
        </thead> -->
<h1>Items</h1>
<?php
foreach ($this->view_data as $key => $value) {
        echo "$key" . "\n" . var_dump($value);
}

<?php
switch ($_GET['type']) {
    case 'recurrentEvent':
        recurrentEvent();
        break;
    case 'singleEvent':
        singleEvent();
        break;
    case 'deleteEventCheck':
        deleteEventCheck();
        break;
    case 'deleteRecurrentEvent':
        deleteRecurrentEvent();
        break;
}

function recurrentEvent()
{
    $connect = new PDO('mysql:host=localhost;dbname=scheduler', 'root', '');
    $days = $_POST['days'];
    $start_time = $_POST['start'];
    $end_time = $_POST['end'];
    $week_type = $_POST['week_type'];
    $title = $_POST['title'];
    $recurrence = $_POST['recurrence'];

    $day = explode(' ', $days);

    $query = "INSERT INTO events (title, start_event, end_event, parent_event) VALUES (:title, :start_event, :end_event, :parent_event)";
    $statement = $connect->prepare($query);
    $parent_event = 0;
//iterating days
    for ($i = 0; $i < sizeof($day) - 1; $i++) {
        $temp = 'next ' . $day[$i];
        $date = date('Y-m-d', strtotime($temp));
        $start = $date . " " . $start_time;
        $end = $date . " " . $end_time;

        $statement->execute(
            array(
                ':title' => $title,
                ':start_event' => date('Y-m-d H:i:s', strtotime($start)),
                ':end_event' => date('Y-m-d H:i:s', strtotime($end)),
                ':parent_event' => $parent_event,
            )
        );
        if ($i == 0) {
            $parent_event = $connect->lastInsertId();
        }
        if ($week_type == 7) {
            $day_diff = '+7 day ' . ', ';
        } else {
            $day_diff = '+14 day ' . ', ';
        }

        for ($j = 1; $j < $recurrence; $j++) {

            if ($week_type == 14) {
                $recurrence--;
            }
            $num = ($day_diff . $date);
            $date = date('Y-m-d', strtotime($num));
            $start = $date . " " . $start_time;
            $end = $date . " " . $end_time;

            $statement->execute(
                array(
                    ':title' => $title,
                    ':start_event' => date('Y-m-d H:i:s', strtotime($start)),
                    ':end_event' => date('Y-m-d H:i:s', strtotime($end)),
                    ':parent_event' => $parent_event,
                )
            );
        }
    }
}

function singleEvent()
{
    $connect = new PDO('mysql:host=localhost;dbname=scheduler', 'root', '');

    $start_time = $_POST['start'];
    $end_time = $_POST['end'];
    $title = $_POST['title'];

    $query = "INSERT INTO events (title, start_event, end_event) VALUES (:title, :start_event, :end_event)";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':title' => $title,
            ':start_event' => date('Y-m-d H:i:s', strtotime($start_time)),
            ':end_event' => date('Y-m-d H:i:s', strtotime($end_time)),
        )
    );
}

function deleteEventCheck()
{
    $id = $_POST['event_id'];
    $connect = new PDO('mysql:host=localhost;dbname=scheduler', 'root', '');
    $query = "SELECT * from events where id = :id and parent_event=0";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $id,
        )
    );
    if ($statement->rowCount() > 0) {
        echo json_encode([
            'event_id' => $id,
            'parent' => 0,
        ]);
    } else {
        echo json_encode([
            'event_id' => $id,
            'parent' => 1,
        ]);
    }

}

function deleteRecurrentEvent(){
    $id = $_POST['id'];
    $connect = new PDO('mysql:host=localhost;dbname=scheduler', 'root', '');
    $parent_id = "SELECT * from events where id=:id";
    $statement = $connect->prepare($parent_id);
    $statement->execute(
        array(
            ':id' => $id,
        )
    );


    $query = "DELETE from events where parent_event=:id";
    $result = $connect->prepare($query);

    $result->execute(
        array(
            ':id' => $statement->fetchColumn(4),
        )
    );
    
}

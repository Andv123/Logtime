<table>
    <tr>
        <td colspan="7">List over time</td>
    </tr>
    <thead>
    <tr>
        <th>Stt</th>
        <th>Date</th>
        <th>Type date</th>
        <th>Name</th>
        <th>Start time</th>
        <th>End time</th>
        <th>Work</th>
        <th>Overtime</th>
    </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach($overtime as $ot)
            <tr>
                <td>{{$i}}</td>
                <td>{{$ot->date}}</td>
                <td>
                    <?php
                        if ($ot->date_type == 1) {
                            echo "weekday";
                        } elseif ($ot->date_type == 2) {
                            echo "weekend";
                        } else {
                            echo "holiday";
                        }
                    ?>
                </td>
                <td>{{$ot->user->full_name}}</td>
                <td>{{$ot->time_start}}</td>
                <td>{{$ot->time_end}}</td>
                <td>{{$ot->work}}</td>
                <td>{{$ot->over_time}}</td>
            </tr>
            <?php $i++; ?>
        @endforeach
    </tbody>
</table>

<table>
    <tr>
        <td colspan="8">Over time</td>
    </tr>
    <thead>
        <tr>
            <th>STT</th>
            <th>Username</th>
            <th>Email</th>
            <th>Date OT</th>
            <th>Time start</th>
            <th>Time end</th>
            <th>Work OT</th>
            <th>Over time</th>
        </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
    @foreach($overtime as $ot)
        <tr>
            <td>{{$i}}</td>
            <td>{{$ot->user->full_name}}</td>
            <td>{{$ot->user->email}}</td>
            <td>{{$ot->date}}</td>
            <td>{{$ot->time_start}}</td>
            <td>{{$ot->time_end}}</td>
            <td>{{$ot->work}}</td>
            <td>{{$ot->over_time}}</td>
        </tr>
        <?php $i++; ?>
    @endforeach
    </tbody>
</table>

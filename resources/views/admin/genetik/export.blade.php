<table class="table table-bordered table-striped">
    <thead>
        <tr class="info">
            <th style="text-align:center;">
                No.
            </th>
            <th style="text-align:center;">
                Hari
            </th>
            <th style="text-align:center;">
                Jam
            </th>
            <th style="text-align:center;">
                Nama Ruangan
            </th>
            <th style="text-align:center;">
                Kapasitas Ruangan
            </th>
            <th style="text-align:center;">
                Mata Kuliah
            </th>
            <th style="text-align:center;">
                Dosen Pengampu
            </th>
            <th style="text-align:center;">
                Semester
            </th>
            <th style="text-align:center;">
                SKS
            </th>
            <th style="text-align:center;">
                Kelas
            </th>
            <th style="text-align:center;">
                Nilai
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach($schedules as $key => $schedule)
        <tr>
            <td align="center">
                {{ $key + 1 }}
            </td>
            <td >
                {{
                    isset($schedule->day->name_day) ? $schedule->day->name_day : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->time->range) ? $schedule->time->range : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->room->name) ? $schedule->room->name : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->room->capacity) ? $schedule->room->capacity : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->teach->course->name) ? $schedule->teach->course->name : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->teach->lecturer->name) ? $schedule->teach->lecturer->name : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->teach->course->semester) ? $schedule->teach->course->semester : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->teach->course->sks) ? $schedule->teach->course->sks : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->teach->class_room) ? $schedule->teach->class_room : ''
                }}
            </td>
            <td >
                {{
                    isset($schedule->value) ? $schedule->value : ''
                }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

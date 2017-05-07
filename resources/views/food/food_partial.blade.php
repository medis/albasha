<tr>
  <td>{{ Html::image($food->thumbnail) }}</td>
  <td>{{ $food->title }}</td>
  <td>{{ $food->price }}</td>
  <td>{{ $food->created_at->toDayDateTimeString() }}
  <td>
    <ul>
      <li><a href="{{ route('food.edit', $food) }}">Edit</a></li>
      <li><a href="{{ route('food.destroy', $food) }}" data-confirm="Are you sure you want to delete this?">Delete</a></li>
    </ul>
  </td>
</tr>
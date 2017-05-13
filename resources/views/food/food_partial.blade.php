<tr>
  <td>
    @if (!empty($food->thumbnail))
      {{ Html::image($food->thumbnail) }}
    @else
      <div class="empty-image"></div>
    @endif
  </td>
  <td>{{ $food->title }}</td>
  <td>{{ $food->getPrice() }}</td>
  <td>{{ $food->created_at->toDayDateTimeString() }}
  <td>
    <ul>
      <li><a href="{{ route('food.edit', $food) }}">Edit</a></li>
      <li><a href="{{ route('food.destroy', $food) }}" data-confirm="Are you sure you want to delete this?">Delete</a></li>
    </ul>
  </td>
</tr>
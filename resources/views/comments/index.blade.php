<x-layout title="Manage comments">
  <div class="container py-4">
    <h1>Comments</h1>

    <x-flash-message />

    <table class="table mt-4">
      <thead>
        <tr>
          <th width="20">No</th>
          <th>Author</th>
          <th>Comment</th>
          <th width="130">Commented on</th>
          <th width="250">Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $updated = session('updated');
        @endphp
        @foreach ($comments as $index => $comment)
          <tr class="{{ $updated != $comment->id ? '' : ($comment->approved ? 'table-success' : 'table-danger') }}">
            <td>{{ $comments->firstItem() + $index }}</td>
            <td>{{ '@' . $comment->user->username }}</td>
            <td>{{ $comment->body }}</td>
            <td>
              <a href="{{ $comment->image->permalink() }}">
                <img src="{{ $comment->image->fileUrl() }}" width="100" />
              </a>
            </td>
            <td>
              @if (auth()->id() === $comment->user_id)
                <a href="#" class="btn btn-sm btn-outline-success disabled">Approve</a>
                <a href="#" class="btn btn-sm btn-outline-primary disabled">Reply</a>
              @else
                <x-form method="put" action="{{ route('comments.update', $comment->id) }}" style="display:inline;">
                  <input type="hidden" name="approved" value="{{ $comment->approved ? 0 : 1 }}">
                  <button class="btn btn-sm btn-outline-{{ $comment->approved ? 'warning' : 'success' }}">
                    {{ $comment->approved ? 'Unapprove' : 'Approve' }}
                  </button>
                </x-form>
                <a href="{{ route('comments.reply.create', $comment->id) }}"
                  class="btn btn-sm btn-outline-primary">Reply</a>
              @endif
              <x-form method="delete" action="{{ route('comments.destroy', $comment->id) }}" style="display:inline;"
                onsubmit="return confirm('Are you sure?')">
                <button class="btn btn-sm btn-outline-danger">
                  Remove
                </button>
              </x-form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{ $comments->links() }}
  </div>

  @push('scripts')
    <script>
      setTimeout(() => {
        const rows = document.querySelectorAll("tr[class^='table-']");

        rows.forEach(row => {
          row.removeAttribute('class');
        });
      }, 1500);
    </script>
  @endpush
</x-layout>

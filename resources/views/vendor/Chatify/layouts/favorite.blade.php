<div class="favorite-list-item">
    @if ($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{ $user->avatar ? asset('storage/avatar/' . $user->avatar) : 'https://ui-avatars.com/api/?background=random&name=' . urlencode($user->first_name . ' ' . $user->last_name) }}');">
        </div>
        <p>{{ strlen($user->first_name . ' ' . $user->last_name) > 5 ? substr($user->first_name . ' ' . $user->last_name, 0, 6) . '..' : $user->first_name . ' ' . $user->last_name }}
        </p>
    @endif
</div>

            <div class="form-group">
                <label for="exampleInputNama">Username</label>
                <input type="text" name="username" value="{{ $model->name }}" class="form-control"
                    id="exampleInputNama" placeholder="Enter name">
                    @error('username')
                    <div class="invalid-feedback mb-3" style="display: block;">
                        {{ $message }}
                    </div>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail">Email address</label>
                <input type="email" name="email" value="{{ $model->email }}" class="form-control"
                    id="exampleInputEmail" placeholder="Enter email">
                @foreach ($errors->get('email') as $msg)
                    <p class="text-danger">{{ $msg }} </p>
                @endforeach
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" class="form-control">
                    <option value="">--Pilih Role--</option>
                    <option {{ $model->roles == 'super admin' ? 'selected' : '' }} value="super admin">Super Admin</option>
                    <option {{ $model->roles == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                    <option {{ $model->roles == 'user' ? 'selected' : '' }} value="user">User</option>
                </select>
                @foreach ($errors->get('role') as $msg)
                    <p class="text-danger">{{ $msg }} </p>
                @endforeach
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" name="password" value="{{ $model->password }}" class="form-control"
                    id="exampleInputPassword" placeholder="Password">
                @foreach ($errors->get('password') as $msg)
                    <p class="text-danger">{{ $msg }} </p>
                @endforeach
            </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-success" href="{{ url('user') }}">
                    Cancel</a>
            </div>

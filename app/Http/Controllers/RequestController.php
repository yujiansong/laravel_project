<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Country;
use App\Http\Requests\SubmitFormRequest;
use App\Image;
use App\Page;
use App\Post;
use App\Rules\SensitiveWorldRule;
use App\Tag;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    public function show()
    {
        return view('request.form');
    }

    public function form(Request $request)
//    public function form(SubmitFormRequest $request)
    {
//        dd($request->all()); //获取全部数据get或者post
//        dd($request->except('id')); //排除id字段
//        dd($request->only('name', 'age')); //获取指定字段
//        $id = $request->has('id') ? $request->get('id') : 0; //判断是否包含自指定字段
//        $name = $request->exists('name') ? $request->post('name') : 'none';

//        $from = $request->input('from', 'guess');
//        $books = $request->input('books', 'none');
//        $book = $request->input('books.0'); //分别获取每个数组元素
//        $book = $request->input('books.0.author');
//        $book = $request->input('books.0.name');
//        $book = $request->input('date');
//        $json = $request->json();
//        dump($request->segments());
//        dump($id == $request->segment(2));
        /*
        Validator::make($request->all(), [
            'title' => 'bail|required|string|between:2,32',
            'url' => 'sometimes|url|max:200',
            'picture' => 'nullable|string'
        ], [
            'title.required' => '标题字段不能为空',
            'title.string' => '标题为字符串格式',
            'title.between' => '标题范围为2到32个字节',
            'url.url' => 'url格式不正确',
            'url.max' => 'url不能超过200个字符',
        ])->validate();
        */

        $this->validate($request, [
            'title' => [
                'bail',
                'required',
                'string',
                'between:2,32',
                new SensitiveWorldRule(),
                /*
                function ($attribute, $value, $fail) {
                    if (strpos($value, '敏感词') !== false) {
                        return $fail('标题包含了系统禁用的敏感词');
                    }
                }
                */
            ],
            'url' => 'sometimes|url|max:200',
            'picture' => 'nullable|string'
        ], [
                'title.required' => '标题字段不能为空',
                'title.string' => '标题为字符串格式',
                'title.between' => '标题范围为2到32个字节',
                'url.url' => 'url格式不正确',
                'url.max' => 'url不能超过200个字符',
            ]);
        return response('表单验证通过');
    }

    public function DbFacecad()
    {
//        $users = DB::select('select * from `users`');
//        dd($users);

        /*
        //PDO的参数绑定
        $name = 'yujiansong';
        $user = DB::select('select * from `users` where name = ?', [$name]);
        dd($user);
        */
        /*
        $email = 'yujiansong6@163.com';
        $user = DB::select('select * from `users` where email = :email', ['email' => $email]);
        dd($user);
        */

        //原生插入语句
        /*
        $name = str_random(10);
        $email = str_random(10).'@163.com';
        $password = bcrypt('secret');
        $result = DB::insert('insert into `users` (`name`, `email`, `password`) values(?, ?, ?)', [$name, $email, $password]);
        dd($result);
        */

        //原生更新语句
        /*
        $name = str_random(8);
        $email = str_random(8).'@gmail.com';
        $id = 8;
        $result = DB::update('update `users` set `name` = ?, `email` = ? WHERE id = ?', [$name, $email, $id]);
        dd($result);
        */

        //原生删除语句
        /*
        $id = 8;
        $result = DB::delete('delete from `users` where id = ?', [$id]);
        dd($result);
        */

    }

    public function DBConstructor()
    {
        //查询制定数据表中的所有记录
        /*
        $users = DB::table('users')->get();
        dd($users);
        */

        //指定查询条件
        /*
        $name = 'yujiansong';
        //$user = DB::table('users')->where('name', $name)->get();
        //$user = DB::table('users')->where('name', $name)->first(); //返回查询结果中的第一条记录
        $user = DB::table('users')->select('id', 'name', 'email')->where('name', $name)->first(); //查询指定字段
        dd($user);
        */

        /*
        $flag = DB::table('users')->insert([
            'name' => str_random(8),
            'email' => str_random(8).'@linux.com',
            'password' => bcrypt('secret'),
        ]);
        dd($flag);
        */

        /*
        $flag = DB::table('users')->insertGetId([
            'name' => str_random(8),
            'email' => str_random(8).'@163.com',
            'password' => bcrypt('secret'),
        ]);
        dd($flag);
        */

        /*
        $flag = DB::table('users')->insert([
           ['name' => str_random(8), 'email' => str_random(8).'@126.com', 'password' => bcrypt('secret')],
           ['name' => str_random(8), 'email' => str_random(8).'@126.com', 'password' => bcrypt('secret')],
           ['name' => str_random(8), 'email' => str_random(8).'@126.com', 'password' => bcrypt('secret')],
        ]);
        dd($flag);
        */

        //更新记录
        /*
        $id = 11;
        $affectedRows = DB::table('users')->where('id', '>', $id)->update(['name' => str_random(8)]);
        dd($affectedRows);
        */

        //删除记录
        /*
        $id = 11;
        $affectedRows = DB::table('users')->where('id', '>', $id)->delete();
        dd($affectedRows);
        */

        /*
        $name = 'yujiansong';
        $email = DB::table('users')->where('name', $name)->value('email');
        dd($email);
        */

        /*
        $name = 'yujiansong';
        $exists = DB::table('users')->where('name', $name)->exists();
        dd($exists);
        */

        /*
        $users = DB::table('users')->where('id', '<', 10)->pluck('name', 'id');
        dd($users);
        */

        /*
        $names = [];
        DB::table('users')->orderBy('id')->chunk(5, function ($users) use (&$names) {
            foreach ($users as $user) {
                $names[] = $user->name;
            }
        });
        dd($names);
        */

//        $num = DB::table('users')->count();
//        $sum = DB::table('users')->sum('id');
//        $avg = DB::table('users')->avg('id');
//        $max = DB::table('users')->max('id');
//        $min = DB::table('users')->min('id');

//        $email = DB::table('users')->where('email', 'like', '%XsK6JPwE%')->get();
//        $name = DB::table('users')->where('id', '>', 10)->where('email', 'like', '%yujiansong%')->get();
//        $name = DB::table('users')->where([['id', '>', 10], ['email', 'like', '%yujiansong%']])->get();
//        $name = DB::table('users')->where('name', 'like', '%yujiansong%')->orWhere('email', 'like', '%yujiansong%')->get();
//        $users = DB::table('users')->whereBetween('id', [1, 10])->pluck('name', 'email');
//        $users = DB::table('users')->whereNotBetween('id', [11, 170])->pluck('name', 'email');
//        $users = DB::table('users')->whereIn('id', [1,3,5,7,9])->pluck('name', 'email');
//        $users = DB::table('users')->whereNotIn('id', [1,3,5,7,9])->pluck('name', 'email');
//        $users = DB::table('users')->whereNull('email_verified_at')->where('id', '<', 10)->pluck('name', 'email');
//        $users = DB::table('users')->whereNotNull('email_verified_at')->where('id', '<', 120)->pluck('name', 'email');

//        $users = DB::table('users')->whereYear('created_at', 2018)->get();
//        $users = DB::table('users')->whereMonth('created_at', 12)->get();
//        $users = DB::table('users')->whereDay('created_at', 14)->get();
//        $users = DB::table('users')->whereDate('created_at', '2019-01-14')->get();
//        $users = DB::table('users')->whereTime('created_at', '02:23:15')->get();
//        $users = DB::table('users')->whereColumn('updated_at', '>', 'created_at')->get();

        /*
        $users = DB::table('users')->where('id', '>', 190)->orWhere(function ($query) {
            $query->where('nickname', 'like', '%jike%')
                ->whereDate('created_at', '<=', '2018-12-08')
                ->whereTime('created_at', '<', '18:00');
        })->get();
        dd($users);
        */

        //WHERE EXISTS
        /*
        $users = DB::table('users')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('posts')
                    ->whereRaw('posts.user_id = users.id');
            })->get();
        dd($users);
        */

        /*
        $users = DB::table('users')->whereNull('email_verified_at')->select('id');
        $posts = DB::table('posts')->whereInSub('user_id', $users)->pluck('id', 'user_id');
        dd($posts);
        */

        //内连接
        /*
        $posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name', 'users.email')
            ->get();
        dd($posts);
        */

        //左外连接
        /*
        $posts = DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name', 'users.email')
            ->get();
        dd($posts);
        */

        //右外连接
        /*
        $posts = DB::table('posts')
            ->rightJoin('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.*', 'users.name', 'users.email')
            ->get();
        dd($posts);
        */

        //联合查询
        /*
        $post_a = DB::table('posts')->where('views', 0);
//        $post_b = DB::table('posts')->where('id', '<=', 10)->unionAll($post_a)->get();
        $post_b = DB::table('posts')->where('id', '<=', 10)->union($post_a)->get();
        print_r($post_b);
        */

        //排序
//        $posts = DB::table('posts')->orderBy('created_at', 'desc')->pluck('created_at', 'id');
//        $posts = DB::table('posts')->inRandomOrder()->pluck('created_at', 'id'); //随机排序
//        dd($posts);

        //分组排序
        /*
        $posts = DB::table('posts')
            ->groupBy('user_id')
            ->selectRaw('user_id, sum(views) as total_views')
            ->orderBy('total_views', 'desc')
            ->get();
        dd($posts);
        */

        /*
        $posts = DB::table('posts')
            ->groupBy('user_id')
            ->selectRaw('user_id, sum(views) as total_views')
            ->having('total_views', '>=', 10)
            ->orderBy('total_views', 'desc')
            ->get();
        dd($posts);
        */

        //分页
        /*
        $posts = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->where('views', '>', 0)
            ->skip(10)->take(5)
            ->get();
        dd($posts);
        */

        /*
        $posts = DB::table('posts')
            ->orderBy('created_at', 'desc')
            ->where('views', '>', 0)
            ->offset(10)->limit(5)
            ->get();
        dd($posts);
        */
    }

    public function eloquent()
    {
        //$posts = Post::all();

        /*
        foreach ($posts as $post) {
            dump($post->id);
        }
        */

        /*
        Post::chunk(10, function ($posts) {
           foreach ($posts as $post) {
               if ($post->views == 0) {
                   continue;
               } else {
                   dump($post->title.' : '.$post->views);
               }
           }
        });
        */

        //每次之获取1条查询结果
        /*
        foreach (Post::cursor() as $post) {
            dump($post->title. ' : '.$post->views);
        }
        */

        /*
        $posts = Post::where('views', '>', 0)->select('id', 'title', 'content')->get();
        dd($posts);
        */

//        $posts = Post::where('views', '>', 0)->orderBy('id', 'desc')->offset(10)->limit(5)->get();
//        $user = User::where('name', 'yujiansong')->first();
//      dd($user->name);

//        $user = User::find(1);

//        $user = User::findOrFail(111);

//        $num = User::whereNotNull('email_verified_at')->count();
//        $sum = User::whereNotNull('email_verified_at')->sum('id');
//        $avg = User::whereNotNull('email_verified_at')->avg('id');
//        $max = User::whereNotNull('email_verified_at')->max('id');
//        $min = User::whereNotNull('email_verified_at')->min('id');

        /*
        $post = new \App\Post();
        $post->title = '国足';
        $post->content = '亚洲杯又输了';
        $insert = $post->save();
        dd($insert);
        */

        /*
        $post = Post::find(31);
        $post->title = '中国国足';
        $update = $post->save();
        dd($update);
        */

        /*
        $post = Post::find(30);
        $delete = $post->delete();
        dd($delete);
        */

        /*
        $delete = Post::destroy([29, 28, 27]);
        dd($delete);
        */

        /*
        $id = Post::find(24);
        dd($id->delete());
        */

    }

    public function eloquentB(Request $request)
    {
        /*
        $post = new \App\Post();
        $post->title = '王二牛逼';
        $post->content = '王老二专业吃鸡';
        $post->user_id = 2;
        $post->views = 23;
        $insert = $post->save();
        dd($insert);
        */

        //批量赋值
        /*
        $post = new \App\Post([
            'title' => '老郑',
            'content' => '西北第一才子',
            'user_id' => 6,
            'views' => 28
        ]);
        $insert = $post->save();
        dd($insert);
        */

        /*
        $post = new Post($request->all());
        $post->user_id = 20;
        dd($post->save());
        */

        //批量更新
        /*
        $post = Post::findOrFail(33);
        $post->fill($request->all());
        dd($post->save());
        */

        //软删除
        /*
        $post = Post::findOrFail(26);
        $post->delete();
        if ($post->trashed()) {
            dump('该记录也被删除');
        }
        */

        //获取查询结果中包括软删除的记录
        /*
        $post = Post::withTrashed()->find(26);
        dd($post);
        */

        //只获取软删除的记录
        /*
        $post = Post::onlyTrashed()->where('views', 0)->select('id', 'title', 'content', 'views', 'deleted_at')->get();
        echo'<pre>';
        print_r($post);
        */

        //恢复软删除的记录
//        dd(Post::destroy([21,22,23,24,25,26]));

//        $post = Post::withTrashed()->find(26);
//        dd($post->restore()); //恢复单个删除记录

        //恢复多个删除记录
        /*
        $post = Post::onlyTrashed()->where('views', 0)->restore();
        dd($post);
        */

        //物理删除数据记录
        /*
        $post = Post::withTrashed()->find(25);
        dd($post->forceDelete());
        */
    }

    public function eloquentC(Request $request)
    {
        /*
        //访问器
        $user = User::find(6);
        dd($user->display_name);
        */

        //修改器
        /*
        $user = User::find(1);
        $user->card_no = '6217007200052490102';
        dd($user->save());
        */

        /*
        $user = User::find(1);
        dd($user->card_num);
        */

        /*
        $user = User::find(1);
        $user->settings = ['city' => '深圳', 'hobby' => '读书，运动，写代码'];
        dd($user->save());
        */

        /*
        $user = User::find(1);
        dd($user->settings);
        */
    }

    /**
     * 全局作用域和局部作用域
     */
    public function eloquentD()
    {
        /*
        $users = User::whereNotNull('email_verified_at')->pluck('name', 'id');
        dd($users);
        */

        /*
        $users = User::all()->pluck('name', 'id');
        dd($users);
        */

        //移除全局作用域
        /*
        $users = User::withoutGlobalScope(\App\Scopes\EmailVerifiedAtScope::class)->orderBy('id')->pluck('name', 'id'); //指定类
        dd($users);
        */

        //匿名函数
        /*
        $users = User::withoutGlobalScope('email_verified_at_scope')->orderBy('id')->pluck('name', 'id');
        dd($users);
        */

        //移除所有作用域
        /*
        $users = User::withoutGlobalScopes()->orderBy('id')->pluck('name', 'id');
        dd($users);
        */

        //移除多个类和匿名函数
        /*
        $users = User::withoutGlobalScopes([\App\Scopes\EmailVerifiedAtScope::class, 'email_verified_at_scope'])->orderBy('id')->pluck('name', 'id');
        dd($users);
        */

        //局部作用域
        /*
        $post = Post::popular()->orderBy('id', 'desc')->pluck('title', 'id');
        dd($post);
        */
    }

    /**
     * 模型事件和监听方式
     * @param Request $request
     */
    public function eloquentE(Request $request)
    {
//        $user = User::find(1);
//        $user = User::whereBetween('id', [1,5])->get();
//        dd($user);

        /*
        $user = User::findOrFail(10);
        dd($user->delete());
        */

        /*
        $post = Post::find(32);
        $post = Post::whereBetween('id', [33, 37])->get();
        dd($post);
        */

        /*
        $user = User::findOrFail(118);
        dd($user->delete());
        */

        /*
        $post = Post::findOrFail(23);
        dd($post->delete());
        */

        /*
        $user = new User();
        $user->name = '上海王老二';
        $user->email = 'wanglaoer@163.com';
        $user->password = bcrypt('123456');
        $user->settings = ['from' => 'liaoning', 'graduate' => 'hnust', 'marriage' => 'yes'];
        dd($user->save());
        */

        $user = User::findOrFail(130);
        $user->name = 'zhengbowen';
        $user->email = 'zhengbowen@outlook.com';
        dd($user->save());

    }

    /**
     *Eloquent 模型关联关系
     * @param Request $request
     */
    public function eloquentF(Request $request)
    {
        //一对一
        /*
        $user = User::findOrFail($request->id);
        dd($user->profile);
        */

        /*
        $userProfile = UserProfile::findOrFail($request->id);
        dd($userProfile->user);
        */


        //一对多
        /*
        $user = User::findOrFail($request->id);
        $posts = $user->posts;
        dd($posts);
        */

        /*
        $post = Post::findOrFail($request->id);
//        $user = $post->user;
        $author = $post->author;
        dd($author);
        */

        //渴求式加载
        /*
        $posts = Post::with('author')
            ->where('views', '>', 0)
            ->offset(1)->limit(10)
            ->get();
        $names = [];
        foreach ($posts as $post) {
            if (!$post->user) {
                continue;
            } else {
                $names[] = $post->author->name;
            }
        }
        dd($names);
        */

        //多对多
        /*
        $post = Post::findOrFail(32);
        $tags = $post->tags;
        dd($tags);
        */

        /*
        $post = Post::with('tags')->find(32);
        $tags = $post->tags;
        dd($tags);
        */

        $tags = Tag::with('posts')->where('name', 'Harvey and Sons')->first();
        $posts = $tags->posts;
        dd($posts);
    }

    /**
     * Eloquent 模型关联关系
     * @param Request $request1
     */
    public function eloquentG(Request $request)
    {
        /*
        $country = Country::findOrFail(1);
        $posts = $country->posts;
        dd($posts);
        */

        /*
        $image = Image::findOrFail(2);
        $item = $image->imageable;
        dd($item);
        */

        /*
        $post = Post::findOrFail(32);
        $image = $post->image;
        dd($image);
        */

        /*
        $user = User::findOrFail(1);
        $image = $user->image;
        dd($image);
        */

        //一对多的多态关联
        /*
        $comment = Comment::findOrFail(2);
        $item = $comment->commentable;
        dd($item);
        */

        /*
        $post = Post::with('comments')->findOrFail(32);
        $comments = $post->comments;
        dd($comments);
        */

        /*
        $page = Page::with('comments')->findOrFail(1);
        $comments = $page->comments;
        dd($comments);
        */

        /*
        $tag = Tag::with('posts', 'pages')->findOrFail(1);
        $post = $tag->posts;
        $page = $tag->pages;
        dd($post);
        */
    }

    /**
     * Eloquent 模型关联关系 下
     * @param Request $request
     */
    public function eloquentH(Request $request)
    {
        /*
        $post = Post::findOrFail(32);
        dd($post->author);
         */

        /*
        $user = User::findOrFail($request->id);
        $posts = $user->posts()->where('views', '>', 0)->get();
        dd($posts);
        */

        /*
        $users = User::has('posts', '>', 1)->get();
        dd($users);
        */

        /*
        $users = Post::has('comments')->orHas('tags')->get();
        dd($users);
        */

        $post = Post::withCount('comments')->findOrFail(1);
        dd($post);
    }

    public function userInfo(Request $request)
    {
//        $user = Auth::user(); //通过Auth门面获取当前登陆用户的完整信息
//        $userId = Auth::id(); //通过Auth门面获取当前登陆用户的id
//        dd(Auth::check()); //通过Auth门面判断用户是否已经登陆

        dd($request->user()); //通过request对象实例获取当前登陆用户信息

    }
















}

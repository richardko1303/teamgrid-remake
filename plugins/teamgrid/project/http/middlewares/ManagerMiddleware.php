<?php
 
namespace Teamgrid\Project\Http\Middlewares;

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Routing\Middleware;
use Teamgrid\Project\Models\Project;
 
use Closure;
 
class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $project = Project::where('id', $request->route('id'))->firstOrFail();

        if(!($project->project_manager_id == auth()->user()->id)) {
            return "403";
        }
 
        return $next($request);
    }
}
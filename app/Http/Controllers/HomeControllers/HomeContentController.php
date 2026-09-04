<?php

namespace App\Http\Controllers\HomeControllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\HomeModel\HomeContent;
use App\Http\Controllers\Controller; // Make sure the Controller is imported.


class HomeContentController extends Controller
{
    // Show the form (Create/Update)
    public function index()
    {
        $homeContent = HomeContent::first(); // Fetch the first record or null
        return view('admin_panel.home_page.main_content.add', compact('homeContent'));
    }

    // Store new data
    public function store(Request $request)
    {
        try {
            // Validation with custom error messages
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'content_2' => 'required|string',
                'content_3' => 'required|string',
            ], [
                'title.required' => 'The title field is required.',
                'title.string' => 'The title must be a string.',
                'description.required' => 'The description field is required.',
                'description.string' => 'The description must be a string.',
                'content_2.required' => 'Content 2 cannot be empty.',
                'content_3.required' => 'Content 3 cannot be empty.',
            ]);

            // Create the new content
            HomeContent::create($validated);

            // Redirect back with a success message
            return redirect()->route('homecontent.index')->with('success', 'Home Content created successfully!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in storing home content: ' . $e->getMessage(), [
                'request' => $request->all(),
                'error' => $e->getTraceAsString(),
            ]);

            // Redirect back with an error message
            return redirect()->route('homecontent.index')->with('error', 'An error occurred while creating the content.');
        }
    }

    // Update existing data
    public function update(Request $request, $id)
    {
        try {
            // Validation with custom error messages
            $validated = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'content_2' => 'required|string',
                'content_3' => 'required|string',
            ], [
                'title.required' => 'The title field is required.',
                'title.string' => 'The title must be a string.',
                'description.required' => 'The description field is required.',
                'description.string' => 'The description must be a string.',
                'content_2.required' => 'Content 2 cannot be empty.',
                'content_3.required' => 'Content 3 cannot be empty.',
            ]);

            // Find the content by ID and update
            $homeContent = HomeContent::findOrFail($id);
            $homeContent->update($validated);

            // Redirect back with a success message
            return redirect()->route('homecontent.index')->with('success', 'Home Content updated successfully!');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in updating home content with ID ' . $id . ': ' . $e->getMessage(), [
                'request' => $request->all(),
                'error' => $e->getTraceAsString(),
            ]);

            // Redirect back with an error message
            return redirect()->route('homecontent.index')->with('error', 'An error occurred while updating the content.');
        }
    }

    // Delete data
    public function destroy($id)
    {
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Attempt to find the HomeContent
            $homeContent = HomeContent::findOrFail($id);

            // Log the deletion attempt
            Log::info('Attempting to delete Home Content with ID ' . $id);

            // Check if SoftDeletes is enabled
            if (in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses(HomeContent::class))) {
                $homeContent->forceDelete(); // Permanent delete
                Log::info('Force deleted Home Content with ID ' . $id);
            } else {
                $homeContent->delete(); // Soft delete or normal delete
                Log::info('Successfully deleted Home Content with ID ' . $id);
            }

            // Commit the transaction
            DB::commit();

            return redirect()->route('homecontent.index')->with('success', 'Home Content deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack(); // Rollback the transaction on failure

            // Handle foreign key constraint violations
            if ($e->getCode() == 23000) { // SQLSTATE[23000]: Integrity constraint violation
                Log::error('Deletion failed due to foreign key constraints: ' . $e->getMessage());
                return redirect()->route('homecontent.index')->with('error', 'Cannot delete content because it is linked to other records.');
            }

            Log::error('Database error while deleting Home Content ID ' . $id . ': ' . $e->getMessage());
            return redirect()->route('homecontent.index')->with('error', 'A database error occurred while deleting the content.');
        } catch (\Exception $e) {
            DB::rollBack(); // Ensure transaction rollback in case of error

            // Log the exception with a detailed stack trace
            Log::error('Unexpected error while deleting Home Content ID ' . $id . ': ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->route('homecontent.index')->with('error', 'An unexpected error occurred while deleting the content.');
        }
    }


}

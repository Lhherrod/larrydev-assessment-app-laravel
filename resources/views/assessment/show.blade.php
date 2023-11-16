<x-app-layout>
    <x-header header="Assessment Completed"/>
    @if(session('status') === 'assessment-completed')
        <x-assessment.container>
            You have already completed the assessment please visit <a class="underline text-green-500" href="{{ route('assessment.edit',$asssessment->ulid) }}">Here</a> to edit your assessment.
        </x-assessment.container>
    @else
        <x-assessment.container>
            You have already completed the assessment please visit <a class="underline text-green-500" href="{{ route('assessment.edit',$asssessment->ulid) }}">Here</a> to edit your assessment.
        </x-assessment.container>
    @endif
</x-app-layout>
<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\User;

class AssessmentService {

    private function checkAssessmentStatus () {
        return auth()->user()->assessmentStatus;
    }
    
    static function getCheckAssessmentStatus () {
        $getCheckAssessmentStatus = new AssessmentService;
        return $getCheckAssessmentStatus->checkAssessmentStatus();
    }


    private function assessmentCheckInStatus () {
        return auth()->user()->assessmentCheckInStatus;
    }

    static function getAssessmentCheckInStatus () {
        $getAssessmentCheckInStatus = new AssessmentService;
        return $getAssessmentCheckInStatus->assessmentCheckInStatus();
    } 


    private function updateAssessmentStatus() {
        return User::where('username', auth()->user()->username)->update(array('assessmentStatus' => 1));
    }

    static function getUpdateAssessmentStatus() {
      $getUpdateAssessmentStatus = new AssessmentService;
      return $getUpdateAssessmentStatus->updateAssessmentStatus();
    }
    

    private function updateAssessment ($request, $user) {
        $assessmentUpdate = new Assessment();

        $assessmentUpdate->where('username', $user)->update($request->validated() + [
            'username' => auth()->user()->username
        ]);

        return $assessmentUpdate;
    }

    static function getUpdateAssessment ($request, $user) {
        $getUpdateAssessment = new AssessmentService;
        return $getUpdateAssessment->updateAssessment($request, $user);
    } 


} 
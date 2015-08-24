'use strict';

angular.module('myApp.view1', ['ngRoute'])

        .config(['$routeProvider', function ($routeProvider) {
          $routeProvider.when('/view1', {
           templateUrl: 'view1/view1.html',
           controller: 'View1Ctrl'
          });
         }])

        .controller('View1Ctrl', ['$scope', "$http", function ($scope, $http) {

          var ImprovConv = function (id) {
           this.id = id;
           this.action = "";
          };

          ImprovConv.prototype.sampleStart = function () {
           console.log("I am a sample");
           var act = [
            {Description: ""},
            {Description: ""}
           ];
           var count = 0;
           var display = $("#im-display");
           display.fadeIn("1000");

           var myFunction = function () {
            if (count === 0) {
             var rand = Math.round(Math.random() * (6000 - 3000)) + 3000;
             setTimeout(myFunction, rand);
            } else if (count < act.length) {
             display.text(act[count].Description);
             var rand = Math.round(Math.random() * (12000 - 6000)) + 6000;
             console.log(rand);
             var snd = new Audio("assets/sounds/sound1.wav");
             snd.play();
             setTimeout(myFunction, rand);
            }
            count++;
           };
           myFunction();
          };

          ImprovConv.prototype.start = function () {
           console.log("I am being start");
           var self = this;
           var acts = [
            {Description: ""}
           ];

           $http.post("http://localhost/ichatstyle/site/allActions", {}).success(function (data) {
            angular.forEach(data["results"], function (value, key) {
             acts.push({Description: value["action"].action});
            });
            if (data.error) {
             self.error = data.error;
             return typeof error === 'function' && error(data);
            }
            typeof success === 'function' && success(data);
           }).error(function (data) {
            typeof error === 'function' && error(data);
           });

           var count = 0;
           var myFunction = function () {
            var display = $("#im-display");
            display.fadeIn("1000");

            if (count === 0) {
             var rand = Math.round(Math.random() * (12000 - 5000)) + 5000;
             setTimeout(myFunction, rand);
            } else if (count < acts.length) {
             display.text(acts[count].Description);
             var rand = Math.round(Math.random() * (20000 - 10000)) + 10000;
             console.log(rand);
             var snd = new Audio("assets/sounds/sound1.wav");
             snd.play();
             setTimeout(myFunction, rand);
            }
            count++;
           };
           myFunction();
          };

          $scope.getChats = function () {
           var chats = [];
           $http.post("http://localhost/ichatstyle/site/chats", {}).success(function (data) {
            angular.forEach(data["chats"], function (value, key) {
             chats.push({title: value.title});
            });
            if (data.error) {
             self.error = data.error;
             return typeof error === 'function' && error(data);
            }
            typeof success === 'function' && success(data);
           }).error(function (data) {
            typeof error === 'function' && error(data);
           });
           $scope.chats = chats;
           console.log("poo", chats);
          }

          $scope.improvConv = new ImprovConv(1);
          $scope.chats = [];

          $scope.start = function () {
           $(".im-play-btn").hide();
           $scope.improvConv.start();
          }


          $("body").on("click", "#im-samplestart-btn", function (e) {
           $(".im-play-btn").hide();
           $scope.improvConv.sampleStart();
          });

          $scope.getChats();


         }]);
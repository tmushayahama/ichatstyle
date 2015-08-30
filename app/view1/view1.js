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
           this.currentAction = "";
          };

          ImprovConv.prototype.quickPlay = function () {
           console.log("I am a quick play");
           var self = this;
           var acts = [
            {id: 0},
            {description: "Warm Up"}
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
            if (count === 0) {
             var rand = Math.round(Math.random() * (12000 - 5000)) + 5000;
             setTimeout(myFunction, rand);
            } else if (count < acts.length) {
             $scope.improvConv.currentAction = acts[count];
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

          ImprovConv.prototype.start = function () {
           console.log("I am being start");
           var self = this;
           var acts = [
            {id: 0},
            {description: ""}
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
            var display = $("#ic-display");
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
          }

          $scope.requestChat = function (user) {
           var data = {
            user_id: user.id,
            chat_id: $scope.selectedChat.id
           };
           $http.post("http://localhost/ichatstyle/site/requestChat", {}).success(function (data) {
            if (data.error) {
             self.error = data.error;
             return typeof error === 'function' && error(data);
            }
            typeof success === 'function' && success(data);
           }).error(function (data) {
            typeof error === 'function' && error(data);
           });
           $scope.users = users;
          }

          $scope.getUsers = function () {
           var users = [];
           $http.post("http://localhost/ichatstyle/site/users", {}).success(function (data) {
            angular.forEach(data["users"], function (value, key) {
             users.push({
              id: value.id,
              firstname: value.firstname,
              lastname: value.lastname
             });
            });
            if (data.error) {
             self.error = data.error;
             return typeof error === 'function' && error(data);
            }
            typeof success === 'function' && success(data);
           }).error(function (data) {
            typeof error === 'function' && error(data);
           });
           $scope.users = users;
          }

          $scope.improvConv = new ImprovConv(1);
          $scope.wizardStep = 0;
          $scope.chats = [];
          $scope.users = [];
          $scope.selectedChat;
          $scope.wizardPrev = function () {
           if ($scope.wizardStep === 3) {
            $scope.wizardStep = 2;
           } else if ($scope.wizardStep === 2) {
            $scope.wizardStep = 1;
           } else if ($scope.wizardStep === 1) {
            $scope.wizardStep = 0;
           }
          }

          $scope.wizardNext = function () {
           if ($scope.wizardStep === 0) {
            $scope.wizardStep = 1;
           } else if ($scope.wizardStep === 1) {
            $scope.wizardStep = 2;
           } else if ($scope.wizardStep === 2) {
            $scope.wizardStep = 3;
           }
          }

          $scope.selectChat = function (index) {
           $scope.selectedChat = $scope.chats[index];
          }
          $scope.selectUser = function (index) {
           $scope.selectedUser = $scope.users[index];
          }

          $scope.quickPlay = function () {
           $scope.improvConv.quickPlay();
          }

          $scope.start = function () {
           $scope.improvConv.start();
          }

          $("body").on("click", "#ic-samplestart-btn", function (e) {
           $scope.improvConv.quickPlay();
          });
          $scope.getChats();
          $scope.getUsers();
         }]);
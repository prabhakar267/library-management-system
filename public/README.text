Welcome to your tutorial repository!
====================
Learn how to use Git and Bitbucket with either SourceTree, one of the best Git clients available, or using Git from the command line. Whichever you choose you will learn how set up Git, clone this repository locally. Then learn how to make and commit a change locally and push that change back to Bitbucket. 

#Start here!
Choose either SourceTree, Atlassian's Git client, or the command line to learn source control using Bitbucket and Git. 

### Use [SourceTree Atlassian's Git client](#markdown-header-sourcetree) for Windows and Mac

![Looking at the repository in SourceTree](https://confluence.atlassian.com/download/attachments/304578655/sourcetree-gui-small.png)

### Use [Git from the command line](#markdown-header-command-line) for Windows, Mac, and Linux

~~~~
	$ git clone https://teamsinspace-sourcetree@bitbucket.org/teamsinspace-sourcetree/tutorial.git
	Cloning into 'tutorial'...
	Password for 'https://teamsinspace-sourcetree@bitbucket.org': 
	remote: Counting objects: 131, done.
	remote: Compressing objects: 100% (100/100), done.
	remote: Total 131 (delta 44), reused 98 (delta 28)
	Receiving objects: 100% (131/131), 19.43 KiB | 0 bytes/s, done.
	Resolving deltas: 100% (44/44), done.
	Checking connectivity... done.
~~~~


**Finally**, if you want a complete end to end tutorial: See our [Bitbucket 101](https://confluence.atlassian.com/x/cgozDQ). 

-----------------
### Collaboration is the core of Git
Unlike SVN, Git makes no distinction between the working copy and the central repository—they are all full-fledged Git repositories.

![Git to SVN comparison](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-basics-clone-repotorepocollaboration.png)

Git's ability to communicate with remote repositories is the foundation of every Git-based collaboration workflow. To learn more about Git and Git workflows see, [Atlassian's Git site](https://www.atlassian.com/git/).


- - -
## SourceTree 
Download, install and configure SourceTree. Source tree is Atlassian's Git GUI client and one of the most popular on the market. 
 
This section contains the following tasks: 

* [Install and configure SourceTree](#markdown-header-install-and-configure-sourcetree): Download, install, and configure SourceTree. 
* [Clone repository locally](#markdown-header-clone-repository-locally): Learn how to clone the bucket-o-sand to your local system. 
	* [Clone from SourceTree welcome wizard](#markdown-header-clone-from-sourcetree-welcome-wizard)
	* [Clone from Bitbucket](#markdown-header-clone-from-bitbucket)
* [Inspect your repository](#markdown-header-inspect-your-repository)
	* [Repository in SourceTree](#markdown-header-repository-in-sourcetree)
	* [Repository in Bitbucket](#markdown-header-repository-in-bitbucket)
* [Make a commit and push a change](#markdown-header-make-a-commit-and-push-a-change)


####Install and configure SourceTree

1. Go to [SourceTree](http://sourcetreeapp.com) and click **Download SourceTree Free**
2. Open the downloaded file and click **Run**
3. Accept the default settings by clicking **Next** at each screen. (Windows only: Follow the instructions for installing .Net Framework if prompted.)
4. Select a location to install SourceTree or accept the default. 
5. Click **Finish** (Mac) or **Install** (Windows).

The SourceTree welcome wizard opens. Select **I agree to the license agreement** and click **Continue**. 

![Welcome wizard open page](https://confluence.atlassian.com/download/attachments/304578655/soucetree-welcomewiz-screen1.png)
 
Fantastic! Now you have SourceTree installed! Next you'll complete SourceTree configuration. 

**Configure SourceTree**

* SourceTree will install Git, if you do not already have a version installed. 

![Git install window](https://confluence.atlassian.com/download/attachments/304578655/sourcetree-install-git.png)

The welcome wizard will help you add an account. 

* Select Bitbucket in the Account **A** section, and enter the same login information you use for your Bitbucket account in the Username and Password fields **B**. 

![Set up account window](https://confluence.atlassian.com/download/attachments/304578655/sourcetree-setup-account.png)

* Click **No** to decline SSH keys for the moment. If you have SSH keys you can add them later. 

Finally, you can [Clone from SourceTree welcome wizard](#markdown-header-clone-from-sourcetree-welcome-wizard) in the next section. 


-----

##Clone repository locally
Next we'll get the repository to your local system. The git clone copies an existing Git repository as its own full-fledged Git repository. Cloning also creates a remote connection called origin pointing back to the original repository.

![Git clone](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-basics-clone.png)

###Clone from SourceTree welcome wizard
If your installing SourceTree you can clone your repository during the configuration process. 

1. Select your repository **1** from the list in the welcome wizard. 
2. Confirm the destination folder **2**, or select a new one. 
3. Click **Ok**. 

![welcome wizard clone dialog](https://confluence.atlassian.com/download/attachments/304578655/sourcetree-setup-selectrepo.png)

Fantastic!! Now you have a clone of the repository on your local system and are ready to work. Next, you can [Inspect your repository](#markdown-header-inspect-your-repository)

###Clone from Bitbucket
Learn how to clone a repository starting from Bitbucket to your local system using SourceTree.

1. Open the sidebar navigation by clicking on the **>>** symbol.
2. Click **Clone** *A*, then click **Clone in SourceTree** *B*.  

![Clone process](https://confluence.atlassian.com/download/attachments/304578655/tutorial-clone-sourcetree1.png)

**NOTE** For Mac you will be asked to launch an application, click **OK** to continue.

This will prompt SourceTree to open the clone dialog, as shown in the following example: 

* Microsoft Windows **A**  
* Macintosh **B** 

![Clone dialog](https://confluence.atlassian.com/download/attachments/304578655/tutorial-clone-step2.png)

Check the destination path and modify it if you wish to place your repository file in a different directory. 

You might want to create a directory specifically for your repositories: 
	/repositories/bucket-o-sand 
	


----
##Inspect your repository
Let's take a look around your repository in both Bitbucket and SourceTree.

####Repository in SourceTree
The files and titles in your repository might be a bit different, but the basics are the same. 

![Looking at the repository in SourceTree](https://confluence.atlassian.com/download/attachments/304578655/sourcetree_gui.png)

**1** Repository bookmarks: displays a list of all the repositories you have listed. You can double click a bookmarked repository to open it in an active tab.

**2** Active repository tab: you can have many repositories open at once, each tab lets you view a different repository. In this example *working copy* is selected, so in the next pane you can see a list of the files in the working copy of this repository. 

**3** View selection: in this pane *working copy* you can choose to view only the files in a particular state (such as: All, Modified, Clean). 

**4** Working copy and Staged changes: here you can see the files in the active view (based on the selection in 3) and drag changed files from working into staged to create a change set to commit.

**5** Currently selected file: you can see the diff view of a selected file in the working copy or staged area. 

####Repository in Bitbucket
Your repository will have some differences but, again, the basics are the same. The view in the following example has the sidebar expanded press [ to expand the sidebar. 

![Looking at a repository in Bitbucket](https://confluence.atlassian.com/download/attachments/304578655/tutorial-sandbucket-bitbucket-reposview.png?)

**A** Actions: all the most common actions are here, create a clone, branch, pull request, etc... 

**B** Navigation: this is where you can get to all the things in Bitbucket (such as: source code, list of commits, list of branches). 

**C** README: The view in the preceding example is on the *Overview* page where you can configure your own README using markdown or plain text.

**D** Recent activity: lists the most recent commits, pushes, merges, and pull request activity. 

----
##Make a commit and push a change 
Now your ready to make a change, add that change to your local repository, and push the change to your remote Bitbucket repository.

####Open a file from SourceTree
A simple thing like selecting and opening a file from the source control UI can make things move quicker. 

1. Select **All** from view selection menu. 
2. Select the 'sample.html' file, then right click and select **Show in Explorer** (Windows). Or click *...* then select **Show in Finder** (Mac)
3. Using your favorite editor, edit the `sample.html` file.
4. Change the heading from *My First File* to *Playing in the Sand*.
5. Save and close the file. 

####Commit the change in SourceTree
Now you've made a change locally and are ready to go through the git process of adding that change to the project history locally.

The 'git add' moves changes from the working directory to the staging area. This gives you the opportunity to prepare a set of changes (a snapshot) before committing it to the official history.

![Git add command](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-basics-add.png)

The git commit takes the staged snapshot and commits it to the project history. Combined with git add, this defines the basic workflow for all Git users.

![Git commit](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-basics-commit.png)

Let's do that in SourceTree
![Modified file in SourceTree](https://confluence.atlassian.com/download/attachments/304578655/tutorial-sourcetree-changedfile.png)

1. Identify the changed file **A** in SourceTree by noting the change in color and from a checkmark to an ellipsis, as shown in the following example. 
2. Click and drag the `sample.html` **A** that file to the *Staged files* **B** area. This action is the same as the 'git add' or 'git stage' command. 
3. Click **Commit** from the [actions menu](#markdown-header-push-the-change-to-bitbucket) in SourceTree. 
4. Add a commit message **C**, then click **Commit**.

Great! Now the snapshot of your change has been added to your local project history. 

####Push the change to Bitbucket 
The last thing we'll do is push that change to Bitbucket. 
 
![SouceTree toolbar with one item highlighted in the push action](https://confluence.atlassian.com/download/attachments/304578655/sourcetree-toolbar-push1.png)

Click **Push** from the toolbar. You'll notice there is a *1* highlighted in the **Push** action. This is the number of commits ready to be pushed to the remote repository, Bitbucket in this case. 

The push dialog opens. Review the settings and click **Ok**.  

![SourceTree push dialog](https://confluence.atlassian.com/download/attachments/304578655/sourcetree-push-dialog.png)

Pushing lets you move a local branch or series of commits to another repository, which serves as a convenient way to publish contributions. This is like svn commit, but it sends a series of commits instead of a single changeset.

![Push graphic](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-remote-repositories-push.png)

Congratulations! You've done all the basics! Feel free to use the tutorial repository to learn more, test, experiment, and expand your knowledge. You can jump into the [Bitbucket 101](https://confluence.atlassian.com/x/cgozDQ) after the *Clone your repository* section. Or you can check out [Atlassian's Git site](https://www.atlassian.com/git/) and learn more about Git workflows. 

All of us at Bitbucket and SourceTree hope your experience is a great one! We are constantly working and building a better Bitbucket and SourceTree. 

- - -

#Command line
  
Learn the very basics of cloning, committing, and pushing from the command line. Git is a very effective from the command line and it's commands are reasonably easy to learn.

**If you don't already have Git installed** on your local system see, [Set up Git](https://confluence.atlassian.com/x/V4DHHw), then return here. 

**This section contains the following tasks: 

* [Clone your repository](#markdown-header-clone-your-repository)
* [Stage, commit, and push a change](#markdown-header-make-a-commit-and-push-the-change)

If you are unfamiliar with the Git, or the Git commands here are a couple very good resources: 

* [Atlassian Git cheatsheet](https://www.atlassian.com/dms/wac/images/landing/git/atlassian_git_cheatsheet.pdf): Nice crisp PDF of all the basic Git commands. 
* [Atlassian's Git site](https://www.atlassian.com/git/)

### Clone your repository:

Cloning makes a local copy of the repository for you.

![Clone from command line](https://confluence.atlassian.com/download/attachments/304578655/repo-setup-clone_menu-sidexpand.png)

1. Click the **Clone** button **A**  in Bitbucket.
2. Make sure the protocol **B** is set to HTTPS.

    Bitbucket pre-fills the clone command for you.
    
3. Copy the command **C**.
4. Open a terminal, or launch a GitBash terminal, on your local machine.
5. Navigate to the directory where you want your files.
6. Paste the command at the prompt.
7. Press ENTER on your keyboard.
The result should be something like 

~~~~
	$ git clone https://teamsinspace-sourcetree@bitbucket.org/teamsinspace-sourcetree/tutorial.git
	Cloning into 'tutorial'...
	Password for 'https://teamsinspace-sourcetree@bitbucket.org': 
	remote: Counting objects: 131, done.
	remote: Compressing objects: 100% (100/100), done.
	remote: Total 131 (delta 44), reused 98 (delta 28)
	Receiving objects: 100% (131/131), 19.43 KiB | 0 bytes/s, done.
	Resolving deltas: 100% (44/44), done.
	Checking connectivity... done.
~~~~


Git clones your repository from Bitbucket to your local machine.
> If you have trouble cloning from these instructions you can check out the more [detailed tutorial](https://confluence.atlassian.com/x/W4DHHw).

The git clone command copies an existing Git repository as its own full-fledged Git repository with its own history, manages its own files, and is a completely isolated environment from the original repository. Cloning also creates a remote connection called origin pointing back to the original repository

![Git clone](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-basics-clone.png)


### Make a commit and push the change

Learn the Git basics of stage, commit, push when you make a change to the 'sample.html' file.

1.  Go to your terminal window and navigate to the repository root.
2.  Using your favorite editor, edit the `sample.html` file.
3.  Change the heading from `My First File` to `Playing in the Sand`. 
4.  Save and close the file.
5.  Stage the file with Git.
    
    `git add sample.html`
    
6.  Commit the change.
 
    `git commit -m "changing sample.html"`
    
7. Push to Bitbucket.

    `git push`
    
    The system prompts you for a username/password.
    
8. Enter your Bitbucket account name and the password.
9. After the push completes, click **Commits**, in Bitbucket, to view your change.

The 'git add' moves changes from the working directory to the staging area. This gives you the opportunity to prepare a set of changes (a snapshot) before committing it to the official history.

![Git add command](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-basics-add.png)

The git commit takes the staged snapshot and commits it to the project history. Combined with git add, this defines the basic workflow for all Git users.

![Git commit](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-basics-commit.png)

Pushing lets you move a local branch or series of commits to another repository, which serves as a convenient way to publish contributions. This is like svn commit, but it sends a series of commits instead of a single changeset.

![Push graphic](https://confluence.atlassian.com/download/attachments/304578655/git-tutorial-remote-repositories-push.png)

Congratulations! You've done all the basics! Feel free to use the tutorial repository to learn more, test, experiment, and expand your knowledge. You can jump into the [Bitbucket 101](https://confluence.atlassian.com/x/cgozDQ) after the *Clone your repository* section. Or you can check out [Atlassian's Git site](https://www.atlassian.com/git/) and learn more about Git workflows. 

All of us at Bitbucket and SourceTree hope your experience is a great one! We are constantly working and building a better Bitbucket and SourceTree.

----

[lexers]: http://pygments.org/docs/lexers/
[fireball]: http://daringfireball.net/projects/markdown/ 
[Pygments]: http://www.pygments.org/ 
[Extra]: http://michelf.ca/projects/php-markdown/extra/
[id]: http://example.com/  "Optional Title Here"
[BBmarkup]: https://confluence.atlassian.com/x/xTAvEw
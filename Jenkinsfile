node {
    try {
	cleanWs()
	environment{  
		String result="0.0.0"
	}
        stage ('Clone') {
	withCredentials([gitUsernamePassword(credentialsId: 'Raju', gitToolName: 'Default')])  {
	git branch: 'master', credentialsId: 'Raju', url: 'https://github.com/Rajucoder/Credit.git'
	previousTag = sh(returnStdout:  true, script: "git describe --tags `git rev-list --tags --max-count=1`").trim()
	latestTag = sh(returnStdout:  true, script: "git describe --tags `git rev-list --tags --max-count=1`").trim()+"-init"
	sh """
		git config --global user.email "rajeshwarinadar721@gmail.com"
		git config --global user.name "Rajucoder"
		git clone --branch master https://github.com/Rajucoder/Credit.git
		cd Credit
		git init
		echo "creating new Tag for previous version"
		git tag -a '${previousTag}-final' `git rev-list -n 1 '${previousTag}'` -m "Retagging the older commit"
		git push origin '${previousTag}-final'
		echo "Creating new Tag for latest version"
		git status
		git tag -a '${latestTag}' -m "Release of new Version"
        	git push origin '${latestTag}'
        	echo "Tag pushed to remote"
	"""
	//env.WORKSPACE = pwd()
	//def version = readFile "${env.WORKSPACE}/version.txt"
	//echo ${version}
        //sh 'git tag -a release-1 -m "Release Candidate"'
        //sh 'git push origin release-1'
        //sh 'echo "Tag pushed to remote"'
	}
        def repoUrl = checkout(scm).GIT_URL
	def key = repoUrl.tokenize('/')[3]
	def slug = repoUrl.tokenize('/')[4]
	echo "The projectKey is: ${key}"
	echo "The repositorySlug is: ${slug}" 
        }
    } catch (err) {
        currentBuild.result = 'FAILED'
        throw err
    }
} 

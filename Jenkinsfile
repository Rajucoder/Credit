node {
    try {
	cleanWs()
        stage ('Clone') {
	withCredentials([gitUsernamePassword(credentialsId: 'Raju', gitToolName: 'Default')])  {
	def versionTag = "release-2"
	def result = "0.0"
	def hash = ""
	git branch: 'main', credentialsId: 'Raju', url: 'https://github.com/Rajucoder/HelloWorld.git'
	env.latestTag = sh(returnStdout:  true, script: "git describe --tags `git rev-list --tags --max-count=1`")
	env.latestTag = ${env.latestTag}+"-final"
	sh """
		git config --global user.email "rajeshwarinadar721@gmail.com"
		git config --global user.name "Rajucoder"
		git clone --branch master https://github.com/Rajucoder/Credit.git
		cd Credit
		git init
		echo "Creating new Tag"
		git status
		git tag -a ${env.latestTag} -m "Release Candidate"
        	git push origin ${env.latestTag}
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

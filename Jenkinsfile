node {
    try {
	cleanWs()
        stage ('Clone') {
	withCredentials([gitUsernamePassword(credentialsId: 'Raju', gitToolName: 'Default')])  {
	sh """
        git config --global user.email "rajeshwarinadar721@gmail.com"
        git config --global user.name "Rajucoder"
        git clone --branch master https://github.com/Rajucoder/Credit.git
        cd Credit
	git init
        echo "Creating new Tag"
	git status
	git git describe --tags `git rev-list --tags --max-count=1`
	"""
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
